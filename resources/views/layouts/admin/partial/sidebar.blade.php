 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     {{-- <a href="#" class="brand-link">
      <img src="{{asset('vendors/dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-dark">HCG</span>
    </a> --}}

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             {{-- <div class="image">
          <img src="{{asset('vendors/dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
             <div class="info">
                 <a href="#" class="d-block">
                     <h2>H C G</h2>
                 </a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview menu-open">
                     <a href="#" class="nav-link @if (request()->is('home')) active @endif ">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             {{-- <i class="right fas fa-angle-left"></i> --}}
                         </p>
                     </a>
                 </li>

                 <li class="nav-item has-treeview">
                 <li class="nav-item">
                     <a href="{{ route('setting.index') }}"
                         class="nav-link @if (request()->is('setting*')) active @endif">
                         <i class="fas fa-cog"></i>
                         <p>
                             Setting
                             {{-- <i class="fas fa-angle-left right"></i> --}}
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                 </li>
                 </li>
                 {{-- <ul class="nav nav-treeview">
                </ul> --}}


                 {{-- Banner Section --}}
                 <li class="nav-item has-treeview @if (request()->is('banner*')) menu-open @endif">
                     <a href="{{ route('banner.index') }}" class="nav-link">
                         <i class="fas fa-image"></i>
                         <p>
                             Banner
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         {{-- <li class="nav-item nav-link">
                        <a href="#" class="nav-link @if (request()->is('banner/create')) inactive @endif">
                            {{-- @if (request()->is('banner/create')) active @endif --}}
                         {{-- <i class="far fa-circle nav-icon"></i>
                        <p>Banner create</p>
                        </a>
                    </li> --}}
                         <li class="nav-item">
                             <a href="{{ route('banner.index') }}"
                                 class="nav-link @if (request()->is('banner*')) inactive @endif">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Banner list</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- About section --}}

                 <li class="nav-item">
                     <a href="{{ route('about.create') }}"
                         class="nav-link @if (request()->is('about*')) active @endif">
                         <i class="fas fa-cog"></i>
                         <p>
                             About Us
                             {{-- <i class="fas fa-angle-left right"></i> --}}
                             {{-- <span class="badge badge-info right">6</span> --}}
                         </p>
                     </a>
                 </li>
                 </li>

                 {{-- Contact us --}}

                 <li class="nav-item has-treeview @if (request()->is('contact*')) menu-open @endif">
                     <a href="{{ route('contact.index') }}" class="nav-link">
                         <i class="fas fa-address-card"></i>
                         <p>
                             Contact us
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('contact.create') }}"
                                 class="nav-link @if (request()->is('contact/create')) Inactive @endif">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Contact create</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('contact.index') }}"
                                 class="nav-link @if (request()->is('contact/list')) Inactive @endif">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Contact list</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- Service section --}}
                 <li class="nav-item has-treeview @if (request()->is('service*')) menu-open @endif">
                     <a href="#" class="nav-link">
                         <i class="fab fa-servicestack"></i>
                         <p>
                             Service
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview ">
                         <li class="nav-item">
                             <a href="{{ route('service.create') }}"
                                 class="nav-link @if (request()->is('service/create')) Inactive @endif">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Service create</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('service.index') }}"
                                 class="nav-link @if (request()->is('service/list')) Inactive @endif">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Service list</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- Member --}}
                 <li class="nav-item has-treeview @if (request()->is('member*')) menu-open @endif">
                     <a href="#" class="nav-link">
                         <i class="fa fa-user" aria-hidden="true"></i>
                         <p>
                             Member
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href=" {{ route('member.create') }}"
                                 class="nav-link @if (request()->is('member/create')) Inactive @endif">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Member create</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="{{ route('member.index') }}"
                                 class="nav-link @if (request()->is('member/index')) Inactive @endif">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Member list</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- Testimonial --}}
                 <li class="nav-item has-treeview @if (request()->is('testimonial*')) menu-open @endif">
                     <a href="#" class="nav-link">
                         <i class="fa fa-user" aria-hidden="true"></i>
                         <p>
                             Testimonial
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview  ">
                         <li class="nav-item  @if (request()->is('testimonial/create ')) Inactive @endif ">
                             <a href=" {{ route('testimonial.create') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Testimonial create</p>
                             </a>
                         </li>

                         <li class="nav-item @if (request()->is('testimonial/list ')) Inactive @endif">
                             <a href="{{ route('testimonial.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Testimonial list</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 {{-- Project --}}
                 {{-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-project-diagram"></i>
                        <p>
                        Project
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=" {{ route('project.create') }}" class="nav-link">
                                <i class="fas fa-project-diagram"></i>
                                <p>Project create</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('project.index') }}" class="nav-link">
                                <i class="fas fa-project-diagram"></i>
                                <p>Project list</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}


             </ul>
             </li>
             </ul>
             </li>

             </ul>
             </li>




             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
     {{-- breadcrumb --}}


 </aside>
