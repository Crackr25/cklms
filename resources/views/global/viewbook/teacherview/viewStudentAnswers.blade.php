<div class="uk-overflow-auto">

      @if($quizInfo->quizstatus == 1)
            <div>
                  <div class="uk-card uk-card-primary uk-card-body bg-success">
                  <h4 class="uk-card-title">THIS QUIZ HAS BEEN GRADED!</h4>
                  <p>You graded this quiz last {{\Carbon\Carbon::create($quizInfo->updateddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}.</p>
                  <button type="button" class="btn btn-icon-label btn-warning" id="view_answers">
                        <span class="btn-inner--icon">
                            <i class="icon-feather-check"></i>
                        </span>
                        <span class="btn-inner--text" id="remove_grade" data-id="{{$quizInfo->id}}">REMOVE GRADE</span>
                    </button>
                  </div>
           

      @endif


      <table class="uk-table uk-table-divider"> 
            @php
                  $QuestionCount = 1;    
                  $totaPoints = 0;
                  $studentTotalPoints = 0;
            @endphp
            @foreach ($quizAnswers as $key=>$item)
                  <tr class="bg-info ">
                        <th class="text-white">{{$QuestionCount}}. {{$item[0]->question}}</th>
                        {{-- <th>
                        @if($item[0]->type == 1)
                              Multiple Choice
                        @elseif($item[0]->type == 2)
                              Identification
                        @elseif($item[0]->type == 3)
                              Essay
                        @endif
                        </th> --}}
                  </tr>
                  @if($item[0]->type == 1)
                        <tr>
                              <td >
                                    <div class="uk-card uk-card-default uk-card-body pb-3 pt-3">
                                          <h5>Question Point: <span>{{$item[0]->points}}</span></h5>
                                    </div>
                                    
                                    <div class="uk-card uk-card-default uk-card-body mt-2">
                                          <h5>Student Answer</h5>
                                                @foreach ($item as $questionitem)
                                                      <p class="pl-4">{{$questionitem->description}}</p>
                                                @endforeach
                                    </div>
                                    <div class="uk-card uk-card-default uk-card-body pb-3 pt-3 mt-2">
                                          <h5>Student Point: <span>{{$quizInfo->quizstatus==1?$item[0]->studPoints:''}}</span></h5>
                                    </div>
                                    @if($quizInfo->quizstatus == 0)
                                          <div class="uk-card uk-card-default uk-card-body pb-3 pt-3 mt-2">
                                                <h5>Question Point:</h5>
                                                <select class="uk-select uk-width-1-3@m points" data-id="{{$item[0]->id}}">
                                                      @for ($i = 0; $i <= $item[0]->points; $i++)
                                                            <option>{{$i}}</option>
                                                      @endfor
                                                </select>
                                          </div>
                                    @endif
                              </td>
                        </tr>
                  @elseif($item[0]->type == 2 || $item[0]->type == 3)
                        <tr>
                        <td colspan="pl-5">
                              <div class="uk-card uk-card-default uk-card-body pb-3 pt-3">
                                    <h5>Question Point: <span>{{$item[0]->points}}</span></h5>
                              </div>
                              <div class="uk-card uk-card-default uk-card-body mt-2">
                                    <h5>Student Answer</h5>
                                    <p class="pl-4">{{$item[0]->description}}</p>
                              </div>
                              <div class="uk-card uk-card-default uk-card-body pb-3 pt-3 mt-2">
                                    <h5>Question Point: <span>{{$quizInfo->quizstatus==1?$item[0]->studPoints:''}}</span></h5>
                                    @if($quizInfo->quizstatus == 0)
                                          <select class="uk-select uk-width-1-3@m points" data-id="{{$item[0]->id}}">
                                                @for ($i = 0; $i <= $item[0]->points; $i++)
                                                      <option>{{$i}}</option>
                                                @endfor
                                          </select>
                                    @endif
                              </div>
                        
                        </td>
                        </tr>
                  @endif
                  @php
                        $totaPoints += $item[0]->points;
                        $QuestionCount += 1;    
                        $studentTotalPoints += $item[0]->studPoints;
                  @endphp
            @endforeach
            <tr class="bg-info ">
                  <td class="p-0">&nbsp;</td>
            </tr>
            <tr>
                  <td>
                        <div class="uk-card uk-card-default uk-card-body mt-2">
                              <div class="uk-child-width-expand@s  uk-grid" uk-grid="">
                                    <div class="uk-first-column">
                                          <h5>Total Quiz Points : </h5>
                                    </div>
                                    <div>
                                          <h5>{{ $totaPoints}}</h5>
                                    </div>
                                    
                                    </div>
                        </div>
                        <div class="uk-card uk-card-default uk-card-body mt-2">
                              <div class="uk-child-width-expand@s  uk-grid" uk-grid="">
                                    <div class="uk-first-column">
                                          <h5>Student Total Points : </h5>
                                    </div>
                                    <div>
                                          
                                          <h5 id="studentTotalPoints">{{$quizInfo->quizstatus==1?$studentTotalPoints:''}}</h5>

                                          
                                    </div>
                              </div>
                        </div>
                        @if($quizInfo->quizstatus == 0)
                              <button type="button" class="btn btn-success mt-3 btn-block btn-lg" id="submit_quiz_score" data-id="{{$quizInfo->id}}">
                                    SUBMIT QUIZ GRADE
                              </button>
                        @endif
                   </td>
            </tr>
      </table>
  </div>

  <script>
        $(document).ready(function(){

            $(document).on('change','.points',function(){

                  var studTotalPoints = 0;

                  $('.points').each(function(){
                        studTotalPoints += parseInt( $(this).val() )
                  })
                  $('#studentTotalPoints').text(studTotalPoints)
            })
       

            

            
        })
  </script>