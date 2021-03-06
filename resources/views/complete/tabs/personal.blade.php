   <?php 
use Healthfy\Http\Controllers\doctorsController; 
use Healthfy\Http\Controllers\customerController; 
$updateData  =doctorsController::getdoctor();
if (!empty($updateData->gentype)) {
$gentype = ($updateData->gender=="Female"?0:1);
}


?>


<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="display: inline-block; position: relative;">
        <h5 class="box-title">Profile Completeness View</h5></a>
         <a onClick="updatePersonal()" class="w3-border pull-right btn" style="position: relative;display:inline-block;"><i class="fa fa-edit"> Update</i></a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
<div class="row">
      <div class="col-sm-4">
            <div class="card  w3-card w3-padding" style="">
              <img class="card-img-top" src="{{Auth::user()->getFirstMediaUrl('image')}}" onerror="try{imgError(this,'{{$gentype}}');}catch(err){ console.log(err)}" alt="Card image cap" style="width:100%">
              <div class="card-body">
                <h5 class="card-title">{{$updateData->title}} {{$updateData->name}}</h5>               
              </div>
              <ul class="list-group list-group-flush">
              
              </ul>
              <div class="card-body">
                <a href="/doctors/{{$updateData->id}}" class="card-link">Doctor Profile</a>
                 <a href="#" onclick="updatePersonalProfileImage()" class="card-link pull-right">Change Image</a>
                </div>
            </div>
            
      </div>
     <div class="col-sm-4">
          <div class="card w3-card" style="">
           <h5 class="box-title w3-blue w3-text-white w3-padding">Profile View</h5>
            <div class="card-body">
              
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$updateData->email}}</li>
                <li class="list-group-item">{{$updateData->tell}}</li>
                <li class="list-group-item">{{$updateData->address}} {{$updateData->city}} {{$updateData->nationality}}</li>
              <li class="list-group-item">${{$updateData->visit_amount}} visist amount</li>
              <li class="list-group-item">{{$updateData->specialization}}   S(p)</li>
                <li class="list-group-item">{{$updateData->type}}</li>
            
            </ul>
           
          </div>
          
      </div>
      <div class="col-sm-4">
          <div class="card w3-card" style="">
            <h5 class="box-title w3-blue w3-text-white w3-padding">Profile View</h5>
            <div class="card-body">
              
            </div>
            <ul class="list-group list-group-flush">
               
              <li class="list-group-item">{{$updateData->datebirth}}</li>
              <li class="list-group-item">{{($updateData->status_id==1?"active":"not active")}} status</li>
              <li class="list-group-item">{{$updateData->experience}} years</li>
            </ul>
            <div class="card-body w3-padding">
               <p class="card-text">{{$updateData->about}}.</p>
             
            </div>
          </div>
          
      </div>
  </div>
</div>
</div>
</div>
  <div class="panel panel-default" style="display: none;">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        <h5 class="box-title">Profile Editting </h5></a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      


     <div class="box-header with-border">
     <h3 class="box-title">Complete Your Profile</h3></div>
  <div id="holefm1">
   <form method="POST"  class="autovaliddate validate"  id="formUpdateDoctora" style="background: inherit; display: block;" action="/savelastupdate" >
      <div class="warner"></div>         
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
           <input type="hidden" name="user_id" value="{{ Request::get('user_id') }}">
                <input type="hidden" name="doctor_id" value="{{ Request::get('doctor_id') }}">
                <div class="row w3-padding">

                    <div class="col-sm-4">
                       <div class="form-group">
                    <label class="w3-text-gray w3-small">Title *</label>
                       <select class="w3-select w3-border" name="title"  id="Title" required>
                        <option value="" disabled selected>Chose title..</option>
                        <?php 
                        $titles = Healthfy\Models\Variables::where("group_key","DoctorTitles")->get();
                        ?>
                        @foreach($titles as $val)
                          @if($updateData->title == $val->status_name)
                           <option value="{{$val->status_name}}" selected>{{$val->status_name}}</option>
                            @else
                            <option value="{{$val->status_name}}">{{$val->status_name}}</option>

                        @endif
                        @endforeach
                      </select> 
                    </div>
                    </div>


                    <div class="col-sm-8"> 
                   <div class="form-group">
                    <label class="w3-text-gray w3-small">Name *</label>
                   <input class="w3-input w3-border" name="doctorname" type="text" placeholder="Fullname" value="{{ $updateData->name }}" required>
                  </div>
                  </div>


                    <div class="col-sm-4">
                    <div class="form-group">
                     <label class="w3-text-gray w3-small">Gender *</label>
                       <select class="w3-select w3-border" name="gender" id="Title" required >
                      
                      @if($updateData->gender == "Male")
                          <option value="" disabled>select gender ...</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                       @elseif($updateData->gender == "Female")
                           <option value="" disabled>select gender ...</option>
                            <option value="Male">Male</option>
                           <option value="Female" selected>Female</option>
                       @else
                       <option value="" disabled selected>select gender ...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                       @endif
                      </select> 
                    </div>
                  </div>

                    <div class="col-sm-4">  <div class="form-group">
                     <label class="w3-text-gray w3-small">Country *</label>
                       <select class="w3-select w3-border" name="nationality" id="countryhidden" required ></select> 
                       
                     
                    </div>
                  </div>

                   <div class="col-sm-4">  <div class="form-group">
                     <label class="w3-text-gray w3-small">City *</label>
                       <select class="w3-select w3-border" name="city" id="cityupdate" required>
                       
                      </select> 
                    </div>
                  </div>

                    <div class="col-sm-4"><div class="form-group">
                    <label class="w3-text-gray w3-small">Years Of Experience *</label>
                   <input class="w3-input w3-border" name="experience" type="number" placeholder="years of your experience" value="{{ $updateData->experience }}" required>
                  </div>
                </div> 



                    <div class="col-sm-4">
                    <div class="form-group">
                     <label class="w3-text-gray w3-small">Phone *</label>
                       <input class="w3-input w3-border" name="doctortell" type="text" placeholder="Phone +2526" value="{{ $updateData->tell }}" required>
                    </div>
                  </div>

                 
                  <div class="col-sm-4">  <div class="form-group">
                     <label class="w3-text-gray w3-small">Date of Birth *</label>
                     <input class="w3-input w3-border" name="birthdate" id="birthdates" type="text" placeholder="birth date" value="{{ $updateData->datebirth }}" required>
                    </div>
                  </div>

                    <div class="col-sm-6"><div class="form-group">
                    <label class="w3-text-gray w3-small">Address *</label>
                   <input class="w3-input w3-border" name="address" type="text" placeholder="Address" value="{{ $updateData->address }}" required>
                  </div></div>
                   <div class="col-sm-6"><div class="form-group">
                    <label class="w3-text-gray w3-small">Visit Ammount*</label>
                   <input class="w3-input w3-border" name="visit_amount" type="number" placeholder="visit amount" value="{{ $updateData->visit_amount }}" required>
                  </div>
                </div>
                <div class="col-sm-12"><div class="form-group">
                    <label class="w3-text-gray w3-small">About You *</label>
                   <textarea class="w3-input w3-border" name="about" type="text" placeholder="your bio" value="{{ $updateData->About }}" required>{{ $updateData->about }}</textarea>
                  </div></div>                   
        </div>
        <div class="w3-padding w3-border-top" style="width: 100%;margin-left: -16px ">
          <p  style="display: inline-block;">    
            Changes made here requires varification, if its not reflected back in 48 hours please contact with the assistance <a href="/feedback"> Here</a>
          </p>
        </div>
        </form>
      </div>




     
</div>
 </div>
 </div>
</div>



