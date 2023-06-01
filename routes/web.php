<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {

//     return view('login');
    
// });
Route::get('/comingsoon', function () {

    return view('comingsoon');
    
});
 
                                                            //  =======================================================

// Route::get('/courseplus', function () {

//     return view('courseplus');
    
// });
Route::get('/courseresume', function () {

    return view('courseresume');
    
});
Route::get('/coursepath', function () {

    return view('course-path');
    
});
// Route::get('/courses', function () {

//     return view('courses');
    
// });
Route::get('/coursedetails', function () {

    return view('coursedetails');
    
});


// Route::get('/books', function () {

//     return view('books');
    
// });
Route::get('/bookdescription', function () {

    return view('bookdescription');
    
});
Route::get('/tableofcontents1', function () {

    return view('tableofcontents1');
    
});
Route::get('/tableofcontents2', function () {

    return view('tableofcontents2');
    
});
Route::get('/tableofcontents3', function () {

    return view('tableofcontents3');
    
});

                                                            //  =======================================================

                                                            //  ========================== ADMIN ======================

                                                            //  =======================================================

       

//Administrator

Route::middleware(['auth', 'isAdministrator','isDefaultPass'])->group(function () {
    Route::get('/admincourses', function () {
    
        return view('admin.admincourses');
        
    });  
    Route::get('/admincreatecourse', function () {
    
        return view('admin.admincreatecourse');
        
    });         
    
    Route::get('/admingeneratestudaccounts', 'Admin\GenerateAccountsController@index');  
    Route::get('/adminexportstudaccounts', 'Admin\GenerateAccountsController@export');  
    Route::get('/adminsubjects', 'Admin\SubjectController@index');  
    Route::get('/adminsubjects/view', 'Admin\SubjectController@view');  
    Route::get('/adminsubjects/edit', 'Admin\SubjectController@edit');  
    Route::get('/adminsubjects/delete', 'Admin\SubjectController@delete');  
    Route::get('/admincreatesubject/{id}', 'Admin\SubjectController@createsubjects');    

    // A C A D E M I C  P R O G R A M S
    Route::get('/adminacademicprogram', 'Admin\AcademicProgramController@index');  
    Route::get('/adminacademicprogram/create', 'Admin\AcademicProgramController@create');  
    Route::get('/adminacademicprogram/getinfo', 'Admin\AcademicProgramController@getinfo');  
    Route::get('/adminacademicprogram/update', 'Admin\AcademicProgramController@update');  
    Route::get('/adminacademicprogram/delete', 'Admin\AcademicProgramController@delete');   
    
    // B O O K S
    Route::get('/adminbooks/{id}', 'Admin\BookController@index'); 
    Route::post('/admincreatebooks/{id}', 'Admin\BookController@createbooks');   
    
    
    // V I E W  B O O K 
    Route::get('/adminviewbook/index', 'Admin\BookController@viewbook');    
    Route::post('/adminviewbook/updatebookinfo', 'Admin\BookController@bookinfoupdate'); 
    Route::get('/adminviewbook/updatebookstatus', 'Admin\BookController@bookstatusupdate');   
    Route::get('/adminviewbook/deleteacadprog', 'Admin\BookController@deleteacadprog');   
    Route::get('/adminviewbook/deletebook', 'Admin\BookController@deletebook');  

    Route::get('/adminviewbook/getchapters', 'Admin\BookController@getchapters');    
    Route::get('/adminviewbook/getlessons', 'Admin\BookController@getlessons');  
    
    Route::get('/adminviewbook/getpartinfo', 'Admin\BookController@getpartinfo');
    Route::get('/adminviewbook/getchapterinfo', 'Admin\BookController@getchapterinfo');
    Route::get('/adminviewbook/getlessoninfo', 'Admin\BookController@getlessoninfo');
    Route::get('/adminviewbook/getquizinfo', 'Admin\BookController@getquizinfo');
    Route::get('/adminviewbook/updateinfo', 'Admin\BookController@updateinfo');

    Route::get('/adminviewbook/addpart', 'Admin\BookController@addpart');  
    Route::get('/adminviewbook/addchapter', 'Admin\BookController@addchapter');  
    Route::get('/adminviewbook/addlesson', 'Admin\BookController@addlesson');  
    
    //admin create quiz
    Route::get('/adminviewbook/addquiz/{id}', 'Admin\BookController@addquiz');
    Route::get('/adminviewbook/createquiz', 'Admin\BookController@createquiz'); 
    Route::get('/adminviewbook/getquizlist', 'Admin\BookController@getquiz');  
    Route::get('/adminviewbook/createquiztitle', 'Admin\BookController@createdescription'); 
    Route::get('/adminviewbook/addquestion', 'Admin\BookController@addquestion');
    Route::get('/adminviewbook/createquestion', 'Admin\BookController@createquestion');
    Route::get('/adminviewbook/createquestionitem', 'Admin\BookController@createquestionitem');
    Route::get('/adminviewbook/createchoices', 'Admin\BookController@createchoices');
    Route::get('/adminviewbook/selectlesson', 'Admin\BookController@lessonSelect')->name('lessonSelect');
    Route::get('/adminviewbook/delquestion', 'Admin\BookController@delquestion');
    Route::get('/adminviewbook/delcoverage', 'Admin\BookController@delcoverage');
    Route::get('/adminviewbook/createdragoption', 'Admin\BookController@createdragoption');
    Route::get('/adminviewbook/createdropquestion', 'Admin\BookController@createdropquestion');
    Route::get('/adminviewbook/createfillquestion', 'Admin\BookController@createFillquestion');
    Route::get('/adminviewbook/del-choices', 'Admin\BookController@delChoices');
    Route::get('/adminviewbook/setpoints', 'Admin\BookController@setPoints');
    Route::get('/adminviewbook/setguideanswer', 'Admin\BookController@setGuideanswer');
    
    //Answer Key
    Route::get('/adminviewbook/getquestion', 'Admin\BookController@getquestion');
    Route::get('/adminviewbook/save-answer-key', 'Admin\BookController@setAnswerKey');
    Route::get('/adminviewbook/save-answer-drop', 'Admin\BookController@setAnswerdrop');
    Route::get('/adminviewbook/returneditquiz', 'Admin\BookController@returneditquiz');
    Route::get('/adminviewbook/getdropquestion', 'Admin\BookController@getDropQuestion');
    Route::get('/adminviewbook/returneditquizdrag', 'Admin\BookController@returnEditdrag');
    Route::get('/adminviewbook/getfillquestion', 'Admin\BookController@getFillQuestion');
    Route::get('/adminviewbook/returneditquizfill', 'Admin\BookController@returnEditfill');
    Route::get('/adminviewbook/getenumquestion', 'Admin\BookController@getEnum');
    Route::get('/adminviewbook/returneditquizenum', 'Admin\BookController@returnEditenum');
    

    
    
    Route::get('/adminviewbook/deletebycontenttype', 'Admin\BookController@deletebycontenttype'); 

    Route::get('/adminviewbook/lessoncontents', 'Admin\LessonController@viewlesson'); 
    // Route::get('/adminviewbook/addquiz', 'Admin\LessonController@addquiz'); 
    
    Route::get('/adminviewbook/chaptertestcontents', 'Admin\ChapterTestController@viewchaptertest');  
    Route::post('/adminviewbook/chaptertestcontents/uploadfiles', 'Admin\ChapterTestController@chapterstestuploadfiles');  
    Route::get('/adminviewbook/chaptertestcontents/deletefile', 'Admin\ChapterTestController@deletefile');  
    
    // Route::get('/adminchaptertest/updatebasicdetails', 'Admin\ChapterTestController@updatebasicdetails');    
    
    
    Route::get('/adminviewbookchapterinfo', 'Admin\BookController@getchapterinfo');        
    Route::get('/adminviewbookchapterinfoedit', 'Admin\BookController@editchapterinfo');      
    Route::get('/create', 'Admin\BookController@create');     
    // Route::get('/delete', 'Admin\BookController@delete');     
    Route::get('/viewlesson', 'Admin\LessonController@viewlesson');       
    Route::get('/editbookgetinfo', 'Admin\BookController@getinfo');       
    Route::get('/editbookupdate', 'Admin\BookController@update');      
    Route::get('/createcontent', 'Admin\BookController@createcontent');
    Route::get('/updatelesson', 'Admin\LessonController@updatelesson');            
    
    // Route::get('/adminparts/{id}', 'Admin\PartController@manualselection');      
    // Route::get('/adminparts/view', 'Admin\PartController@view');      
    // Route::get('/admincreateparts', 'Admin\PartController@createpart');    
    
    // Route::get('/admincreatechapters', 'Admin\PartController@createchapters');
    // Route::get('/admincreatechaptertest', 'Admin\ChapterTestController@createchaptertest');  
    // Route::get('/admincreatechaptertest/createbasicdetails', 'Admin\ChapterTestController@createchaptertestbasicdetails');    
    Route::get('/admincreatechaptertest/createquestion', 'Admin\ChapterTestController@createquestion');  
    Route::get('/admincreatechaptertest/editquestion', 'Admin\ChapterTestController@editquestion');  
    Route::get('/admincreatechaptertest/addanswers', 'Admin\ChapterTestController@addanswers');  
    Route::get('/adminviewchaptertest/view', 'Admin\ChapterTestController@view');  
    Route::get('/adminchaptertest/deletequestion', 'Admin\ChapterTestController@deletequestion');   
    Route::get('/adminchaptertest/editanswer', 'Admin\ChapterTestController@editanswer');   
    Route::get('/adminchaptertest/updateanswer', 'Admin\ChapterTestController@updateanswer');   
    Route::get('/adminchaptertest/deleteanswer', 'Admin\ChapterTestController@deleteanswer');   

    Route::get('/adminchapter', 'Admin\ChapterController@index');    
    
    Route::get('/admincreatelessons', 'Admin\PartController@createlessons');    
    // Route::get('/adminlessoncontents', 'Admin\LessonController@viewlesson');    
    Route::get('/adminlessondelete', 'Admin\LessonController@deletelesson'); 
    Route::post('/adminlessoncontentcreate', 'Admin\LessonController@createcontent');    
    Route::post('/adminlessoncontentupdate', 'Admin\LessonController@updatecontent');   
    Route::post('/adminlessoncontentdelete', 'Admin\LessonController@deletecontent');    
    
    // C L A S S R O O M S
    Route::get('/adminclassrooms', 'Admin\ClassroomController@index');
    Route::get('/adminclassrooms/getdetails', 'Admin\ClassroomController@getdetails');
    
    // T E A C H E R S
    Route::get('/adminteachers', 'Admin\InstructorController@index');
    Route::get('/adminteachers/create', 'Admin\InstructorController@create');
    Route::get('/adminteachers/editstatus', 'Admin\InstructorController@editstatus');
    Route::get('/adminteachers/getinfo', 'Admin\InstructorController@getinfo');
    Route::get('/adminteachers/updateinfo', 'Admin\InstructorController@updateinfo');
    Route::get('/adminteachers/booksassigned', 'Admin\InstructorController@booksassigned');
    Route::get('/adminteachers/searchbook', 'Admin\InstructorController@searchbook');
    Route::get('/adminteachers/assignthisbook', 'Admin\InstructorController@assignthisbook');
    Route::get('/adminteachers/deleteassignedbook', 'Admin\InstructorController@deletethisbook');

    // S T U D E N T S 
    Route::get('/adminstudents', 'Admin\StudentController@index');
    
    Route::get('/admin/passwordgenerator/index', 'Admin\PasswordGeneratorController@index');
    Route::get('/admin/passwordgenerator/filter', 'Admin\PasswordGeneratorController@filter');
    
    //
    // Route::get('/adminmessage', function () {

    //     return view('admin.adminmessage');
        
    // });     
    
           
    // Route::get('/adminstudents', function () {
    
    //     return view('admin.adminstudents');
        
    // });   
    // Route::get('/admininstructors', function () {
    
    //     return view('admin.admininstructors');
        
    // });     
    // Route::get('/admincategories', function () {
    
    //     return view('admin.admincategories');
        
    // });   
    // Route::get('/adminsettings_general', function () {
    
    //     return view('admin.adminsettings_general');
        
    // });   
});
Route::middleware(['auth', 'isTeacher','isDefaultPass'])->group(function () {

    Route::get('/teacherclassrooms', 'Teacher\ClassroomController@index');   
    Route::get('/teacherquizzes', 'Teacher\Teacherquizcontroller@index');   
    Route::get('/teacherclassroom/create', 'Teacher\ClassroomController@create');   
    Route::get('/teachergetavailablecode', 'Teacher\ClassroomController@getavailablecode');
    Route::get('/teacherquiz/create', 'Teacher\Teacherquizcontroller@create'); 
    Route::get('/teacherquiz/delete', 'Teacher\Teacherquizcontroller@delete'); 
    Route::get('/teacherquiz/selectclassroom', 'Teacher\Teacherquizcontroller@classroomSelect')->name('classroomSelect');    
    Route::get('/teacherquiz/selectstudent', 'Teacher\Teacherquizcontroller@studentSelect')->name('studentSelect');    
    Route::get('/teacherquiz/selectquiz', 'Teacher\Teacherquizcontroller@quizSelect')->name('quizSelect');    


    Route::get('/teacherbooks/{id}', 'Teacher\BookController@index');      
    Route::get('/teacherviewbook/{id}', 'Teacher\BookController@viewbook');  
    Route::get('/teachermessages', 'Teacher\BookController@messages');
    
    //teacherquizsched
    Route::get('/teachertestavailability', 'Teacher\Teacherquizcontroller@chaptertestavailability');
    Route::get('/teacherviewresponse', 'Teacher\Teacherquizcontroller@viewResponse');
    Route::get('/teachergetactivequiz', 'Teacher\Teacherquizcontroller@getactivequiz');
    Route::get('teacher/quizresponses', 'Teacher\Teacherquizcontroller@quizResponses');



    //teacherquiz
    Route::get('/teacherquiz/quiz/description', 'Teacher\Teacherquizcontroller@saveDescription');
    Route::get('/teacherquiz/quiz/{id}', 'Teacher\Teacherquizcontroller@createquiz');
    Route::get('/teacherquiz/addquestion', 'Teacher\Teacherquizcontroller@addQuestion');
    Route::get('/teacherquiz/delquestion', 'Teacher\Teacherquizcontroller@delQuestion');
    Route::get('/teacherquiz/createquestion', 'Teacher\Teacherquizcontroller@createQuestion');
    Route::get('/teacherquiz/createchoices', 'Teacher\Teacherquizcontroller@createChoices');
    Route::get('/teacherquiz/del-choices', 'Teacher\Teacherquizcontroller@delChoices');
    Route::get('/teacherquiz/setpoints', 'Teacher\Teacherquizcontroller@setPoints');
    Route::get('/teacherquiz/setguideanswer', 'Teacher\Teacherquizcontroller@setGuideanswer');
    Route::get('/teacherquiz/createquestionitem', 'Teacher\Teacherquizcontroller@createquestionitem');
    Route::get('/teacherquiz/createfillquestion', 'Teacher\Teacherquizcontroller@createFillquestion');
    Route::get('/teacherquiz/createdragoption', 'Teacher\Teacherquizcontroller@createdragoption');
    Route::get('/teacherquiz/createdropquestion', 'Teacher\Teacherquizcontroller@createdropquestion');



    //Answer key

    Route::get('/teacherquiz/getquestion', 'Teacher\Teacherquizcontroller@getquestion');
    Route::get('/teacherquiz/returneditquiz', 'Teacher\Teacherquizcontroller@returneditquiz');
    Route::get('/teacherquiz/save-answer-key', 'Teacher\Teacherquizcontroller@setAnswerKey');
    Route::get('/teacherquiz/getenumquestion', 'Teacher\Teacherquizcontroller@getEnum');
    Route::get('/teacherquiz/returneditquizenum', 'Teacher\Teacherquizcontroller@returnEditenum');
    Route::get('/teacherquiz/getfillquestion', 'Teacher\Teacherquizcontroller@getFillQuestion');
    Route::get('/teacherquiz/returneditquizfill', 'Teacher\Teacherquizcontroller@returnEditfill');
    Route::get('/teacherquiz/getdropquestion', 'Teacher\Teacherquizcontroller@getDropQuestion');
    Route::get('/teacherquiz/save-answer-drop', 'Teacher\Teacherquizcontroller@setAnswerdrop');
    Route::get('/teacherquiz/returneditquizdrag', 'Teacher\Teacherquizcontroller@returnEditdrag');
    Route::get('/teacherquiz/clearanswerenum', 'Teacher\Teacherquizcontroller@clearEnum');
    
    


    //Classroom View 
    Route::get('/teacherclassroomview', 'Teacher\ClassroomController@viewclassroom'); 
    Route::get('/teacheraddstudent', 'Teacher\ClassroomController@addstudent'); 
    Route::post('/teacherpost', 'Teacher\ClassroomController@postv1');     
    Route::get('/teacherpostcomment', 'Teacher\ClassroomController@comment');   
    Route::get('/teacherrefreshcomments', 'Teacher\ClassroomController@refreshcomment');     
    Route::get('/teacheraddthisbook', 'Teacher\ClassroomController@addthisbook'); 

    Route::get('/getteacherclassrooms', 'Teacher\ClassroomController@index');
    Route::get('/classroomfeed', 'Teacher\ClassroomController@classroomfeed');

    Route::get('/post', 'Teacher\ClassroomController@post');
    Route::get('/classroomstudents', 'Teacher\ClassroomController@classroomstudents');
    Route::get('/students', 'Teacher\ClassroomController@students');
    Route::get('/classroombooks', 'Teacher\ClassroomController@classroombooks');
    Route::get('/quizContent/{id}/{classroomid}', 'Teacher\BookController@quizContent');
    Route::get('/updatequizschedule', 'Teacher\BookController@updateQuizSched');
    Route::get('/endQuiz/{id}', 'Teacher\BookController@endQuiz');
    Route::get('/removeGrade/{id}', 'Teacher\BookController@removeGrade');
    Route::get('/viewStudentAnswers/{quizid}/{classroomid}/{studentid}', 'Teacher\BookController@viewStudentAnswers');

    Route::get('submitStudentScore/{od}', 'Teacher\BookController@submitStudentScore');


});

Route::middleware(['auth', 'isStudent','isDefaultPass'])->group(function () {  
    
    Route::get('/studentjoinclassroom', 'Student\StudentClassroomController@joinclassroom');   
    Route::get('/studentviewclassroom', 'Student\StudentClassroomController@index');
    Route::get('/loadclassroomtable', 'Student\StudentClassroomController@loadclassroomtable');
    Route::get('/searchclassroom', 'Student\StudentClassroomController@searchclassroom');

    Route::post('/studentpost', 'Student\StudentClassroomController@post');    
    Route::get('/studentpostcomment', 'Student\StudentClassroomController@comment');   
    Route::get('/studentrefreshcomments', 'Student\StudentClassroomController@refreshcomment'); 
    Route::get('/studentrefreshposts', 'Student\StudentClassroomController@refreshpost');     
    
    Route::get('/chaptertesttakethetest','GlobalController\ViewBookController@takethetest');
    Route::get('/chaptertestsubmitanswers','Student\StudentBookController@submitanswers');
    Route::get('/retakeQuiz/{id}','Student\StudentBookController@retakeQuiz');
    Route::get('/attempt-quiz','Student\StudentBookController@attemptQuiz');
    Route::get('/save-answer','Student\StudentBookController@saveAnswer');
    Route::post('/save-image','Student\StudentBookController@saveImage');


    Route::get('/studentfeed','Student\StudentClassroomController@studentfeed');
    Route::get('/studentclassmates','Student\StudentClassroomController@studentclassmates');
    Route::get('/studentbooks','Student\StudentClassroomController@studentbooks');
    Route::get('/checkForNewComments','Student\StudentClassroomController@checkForNewComments');

    //Teacher quiz for Student
    Route::get('/studentquiz','Student\StudentClassroomController@studentquiz');
    Route::get('/student/attemptquiz/{id}/{classroomid}','Student\StudentClassroomController@attempquiz');
    Route::get('/studentquiz/save-answer','Student\StudentClassroomController@saveAnswer');
    Route::post('/studentquiz/save-image','Student\StudentClassroomController@saveImage');
    Route::get('/studentquiz/submitanswers','Student\StudentClassroomController@submitanswers');


    Route::get('/studentQuizContent/{id}/{classroomid}', 'Student\StudentBookController@studentQuizContent');
    Route::get('/studentQuizContentattempt/{id}/{classroomid}', 'Student\StudentBookController@studentQuizContentattempt');
});
  

Route::group(['middleware' => ['auth', 'web']], function() {

    Route::get('/allbooks', 'Teacher\ClassroomController@allbooks');
    Route::get('/lessonContent/{id}', 'Teacher\BookController@lessonContent');
  

    
    Route::get('/messages', 'GlobalController\MessageController@index');
    Route::get('/messages/getmessage', 'GlobalController\MessageController@getmessage');
    Route::get('/messages/sendmessage', 'GlobalController\MessageController@sendmessage');
    Route::get('/messages/autodisplaymessage', 'GlobalController\MessageController@autodisplaymessage');
    Route::get('/messages/loadmessages', 'GlobalController\MessageController@loadmessages');

    Route::get('/jitsi',function(){
        return view('jitsimeet');
    });
    //View quiz
    Route::get('/quiz/{ids}', 'GlobalController\ViewBookController@viewquiz');
    Route::get('/quizresponses', 'GlobalController\ViewBookController@quizresponses');
    Route::get('/viewquizresponse/{classroomId}/{quizId}/{recordId}', 'GlobalController\ViewBookController@viewquizresponse');
    Route::get('/updatescore', 'GlobalController\ViewBookController@updatescore');
    Route::get('/donecheck', 'GlobalController\ViewBookController@doneCheck');
    Route::get('/getclassroomstudents', 'GlobalController\ViewBookController@getclassroomstudents');
    Route::get('/removeallowedstudent', 'GlobalController\ViewBookController@removeallowedstudent');

    //View Book    
    Route::get('/viewbook/{ids}', 'GlobalController\ViewBookController@viewbook');     

    Route::get('/viewbookchaptertestavailability', 'GlobalController\ViewBookController@chaptertestavailability');
    Route::get('/getactivequiz', 'GlobalController\ViewBookController@getActiveQuiz');
    Route::get('/globalsetting/profileview', 'GlobalController\UserProfileController@profileview');   
    
    Route::get('/videoconference/start','GlobalController\VideoConferenceController@startcall');
    Route::get('/videoconference/checkifcallisrunning','GlobalController\VideoConferenceController@checkifcallisrunning');
    Route::get('/videoconference/join','GlobalController\VideoConferenceController@joincall');

    Route::get('/videoconference/closevideoconference',function(){
        return view('closebrowser');
    });
       

});

Route::middleware(['guest'])->group(function(){

    Route::get('/', function () {
        return view('auth.login');
    });

    Route::post('/registeraccount', 'Auth\RegisterController@create');

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::get('/welcome', function () {
        return view('welcome');
    });
   

});


Route::get('/cklmsgenerateaccount', 'CKLMSControllers\GenerateAccountsController@index');

Route::middleware(['isDefaultPass'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

});

Route::get('hasher', function(){

    return Hash::make('123456789');

});
Route::get('randomize', function(){

    $lowcaps = 'abcdefghijklmnopqrstuvwxyz';

    $permitted_chars = '0123456789'.$lowcaps;

    
    $input_length = strlen($permitted_chars);

    $random_string = '';
    for($i = 0; $i < 5; $i++) {
        $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    // return $random_string;
    $data = array((object)[
        'code'=>'cklms'.$random_string,
        'hash'=>Hash::make('cklms'.$random_string)
    ]);
    

    return $data;

    return $random_string;
   

});
Route::get('/changepass','GeneralController@changePass');
Auth::routes(['register' => false]);
