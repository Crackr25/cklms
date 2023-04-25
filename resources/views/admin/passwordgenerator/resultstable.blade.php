<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            @if($usertype == 'student')
                <div class="col-md-12 mb-2">
                    <h3 class="text-right">STUDENTS</h3>
                </div>
                <div class="col-md-12">
                    <table class="table" id="search-user-student">
                        <thead>
                            <tr>
                                <th style="width: 75%;">&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users)>0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="row">             
                                                <div class="col-12">
                                                    <span>{{$user->firstname}} {{$user->middlename}} {{$user->lastname}} {{$user->suffix}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">             
                                                <div class="col-12">
                                                    {{$user->email}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($user->isDefault == 1)
                                                <button type="button" class="btn btn-success">Default</button>
                                            @else
                                                <button type="button" class="btn btn-warning">RESET</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-md-12 mb-2">
                    <h3 class="text-right">TEACHERS</h3>
                </div>
                <div class="col-md-12">
                    <table class="table" id="search-user-teacher">
                        <thead>
                            <tr>
                                <th style="width: 75%;">&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users)>0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="row">             
                                                <div class="col-12">
                                                    <span>{{$user->firstname}} {{$user->middlename}} {{$user->lastname}} {{$user->suffix}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">             
                                                <div class="col-12">
                                                    {{$user->email}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($user->isDefault == 1)
                                                <button type="button" class="btn btn-success">Default</button>
                                            @else
                                                <button type="button" class="btn btn-warning">RESET</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>