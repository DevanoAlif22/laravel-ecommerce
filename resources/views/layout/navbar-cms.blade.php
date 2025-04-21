<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.product.index')}}" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.transaction.index')}}" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Transaction
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.logout')}}" style="color:red;" class="nav-link">
                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
              <p>LOGOUT</p>
            </a>
          </li>
        </ul>
      </nav>
