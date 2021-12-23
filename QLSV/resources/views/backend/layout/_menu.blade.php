<div class="nav flex-column nav-pills menu-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">

  <a class=" nav-link border border-primary menu-custom-children {{$active == "student" ? 'active' : ''}}" href="{{ url('studentManager') }}" role="tab">Quản lý học viên</a>
  <a class=" nav-link border border-primary menu-custom-children  {{$active == "teacher" ? 'active' : ''}}" href="{{ url('teacherManager') }}" role="tab">Quản lý giáo viên</a>
  <a class=" nav-link border border-primary menu-custom-children  {{$active == "subject" ? 'active' : ''}}" href="{{ url('subjectManager') }}" role="tab">Quản lý môn học</a>



</div>
