<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;
use App\Models\Chapter;
use App\Models\Lesson;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('modules.chapters.lessons')->get();
        return view('listecours', compact('courses'));
    }

    public function store(Request $request)
    {
        try {
            \DB::beginTransaction();
            
            \Log::info('Starting course creation process');
            \Log::info('Received modules data:', ['modules' => $request->modules]);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'teacher' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'level' => 'required|string|max:255',
                'direction' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'modules' => 'required|string'
            ]);

            \Log::info('Validation passed');

            $imagePath = $request->file('image')->store('public/images');
            $imagePath = str_replace('public/', '', $imagePath);
            
            \Log::info('Image saved at: ' . $imagePath);

            $courseData = [
                'title' => $request->title,
                'teacher' => $request->teacher,
                'category' => $request->category,
                'level' => $request->level,
                'direction' => $request->direction,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imagePath,
            ];

            $course = Course::create($courseData);
            \Log::info('Course created with ID: ' . $course->id);

            if (!$course) {
                throw new \Exception('Failed to create course record');
            }

            $modules = json_decode($request->modules, true);
            \Log::info('Decoded modules data:', ['modules' => $modules]);
            
            foreach ($modules as $moduleData) {
                $module = $course->modules()->create([
                    'title' => $moduleData['title']
                ]);
                \Log::info('Created module:', ['module_id' => $module->id, 'title' => $module->title]);

                if (!empty($moduleData['chapters'])) {
                    foreach ($moduleData['chapters'] as $chapterData) {
                        $chapter = $module->chapters()->create([
                            'title' => $chapterData['title']
                        ]);
                        \Log::info('Created chapter:', ['chapter_id' => $chapter->id, 'title' => $chapter->title]);

                        if (!empty($chapterData['lessons'])) {
                            foreach ($chapterData['lessons'] as $lessonData) {
                                $lesson = $chapter->lessons()->create([
                                    'title' => $lessonData['title']
                                ]);
                                \Log::info('Created lesson:', [
                                    'lesson_id' => $lesson->id,
                                    'title' => $lesson->title,
                                    'chapter_id' => $chapter->id
                                ]);
                            }
                        }
                    }
                }
            }

            \DB::commit();
            \Log::info('Transaction committed successfully');

            $course->load('modules.chapters.lessons');

            \Log::info('Course creation completed successfully', [
                'course_id' => $course->id,
                'lesson_count' => $course->modules->sum(function($module) {
                    return $module->chapters->sum(function($chapter) {
                        return $chapter->lessons->count();
                    });
                })
            ]);

            $response = [
                'status' => 'success',
                'message' => 'Course created successfully',
                'course' => $course->toArray()
            ];

            \Log::info('Sending success response', $response);

            return response()->json($response, 201);

        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error in course creation: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            $errorResponse = [
                'status' => 'error',
                'message' => 'Failed to save course',
                'error' => $e->getMessage()
            ];

            \Log::error('Sending error response', $errorResponse);
            
            return response()->json($errorResponse, 500);
        }
    }
}
