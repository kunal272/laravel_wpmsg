 <!-- Page sidebar start-->
 <div class="overlay"></div>
 {{-- <aside class="page-sidebar" data-sidebar-layout="stroke-svg"> --}}
 <aside class="page-sidebar iconcolor-sidebar" data-sidebar-layout="iconcolor-sidebar">
     <div class="left-arrow" id="left-arrow">
         <svg class="feather">
             <use href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#arrow-left">
             </use>
         </svg>
     </div>
     <div id="sidebar-menu">
         <ul class="sidebar-menu" id="simple-bar">
             <li class="pin-title sidebar-list p-0">
                 <h5 class="sidebar-main-title">Pinned</h5>
             </li>
             <li class="line pin-line"></li>
             <li class="sidebar-main-title">General</li>

             @php
                 $permission = session()->get('permission');
             @endphp
             @if (isset($permission) && $permission->dashboard)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/dashboard') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Home">
                             </use>
                         </svg><span>Dashboard</span>
                         <div class="badge badge-primary rounded-pill">3</div>
                     </a>
                 </li>
             @endif


             <li class="sidebar-list">
                 <svg class="pinned-icon">
                     <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Filter">
                     </use>
                 </svg><a class="sidebar-link" href="{{ url('/sendmessage') }}">
                     <svg class="stroke-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Filter">
                         </use>
                     </svg><span>Send Message</span></a>
             </li>



             <li class="sidebar-list">
                 <svg class="pinned-icon">
                     <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                     </use>
                 </svg><a class="sidebar-link" href="{{ url('/device') }}">
                     <svg class="stroke-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Activity">
                         </use>
                     </svg><span>Devices</span>
                 </a>
             </li>


             <li class="sidebar-list">
                 <svg class="pinned-icon">
                     <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                     </use>
                 </svg><a class="sidebar-link" href="{{ url('/phonebook') }}">
                     <svg class="stroke-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Document">
                         </use>
                     </svg><span>PhoneBook</span>
                 </a>

             </li>

             <li class="sidebar-list">
                 <svg class="pinned-icon">
                     <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Chat">
                     </use>
                 </svg><a class="sidebar-link" href="{{ url('/templates') }}">
                     <svg class="stroke-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Chat">
                         </use>
                     </svg><span>Templates</span></a>
             </li>



             @if (isset($permission) && $permission->actionlog)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="javascript:void(0)">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pie">
                             </use>
                         </svg><span>Log</span>
                         <svg class="feather">
                             <use
                                 href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                             </use>
                         </svg></a>
                     <ul class="sidebar-submenu">
                         @if (isset($permission) && $permission->actionlog)
                             <li><a href="{{ url('/actionlog') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Activity Logs</a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif



             @if (isset($permission) && $permission->usermaster)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Profile">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/usermaster') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Profile">
                             </use>
                         </svg><span>UserMaster</span></a>
                 </li>
             @endif

         </ul>
     </div>
     <div class="right-arrow" id="right-arrow">
         <svg class="feather">
             <use href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#arrow-right">
             </use>
         </svg>
     </div>
 </aside>
 <!-- Page sidebar end-->
