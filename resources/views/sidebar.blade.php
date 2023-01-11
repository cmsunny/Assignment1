<li class="nav-item {{ (request()->is('place-add*')) ||  (request()->is('place-list*'))  ? 'active menu-open' : '' }}">
    <a href="#" class="nav-link {{ (request()->is('place-add*')) ||  (request()->is('place-list*'))  ? 'active' : '' }}">
       <i class="fa fa-globe"></i>
       <p>
          City
          <i class="right fas fa-angle-left"></i>
       </p>
    </a>
    <ul class="nav nav-treeview">
       <li class="nav-item">
          <a href="{{route('add.place')}}" class="nav-link {{ (request()->is('place-add*')) ? 'active' : '' }}">
             <i class="far fa-circle nav-icon"></i>
             <p>Add</p>
          </a>
       </li>
       <li class="nav-item">
          <a href="{{route('list.place')}}" class="nav-link {{ (request()->is('place-list*')) ? 'active' : '' }}">
             <i class="far fa-circle nav-icon"></i>
             <p>List</p>
          </a>
       </li>
    </ul>
 </li>
 