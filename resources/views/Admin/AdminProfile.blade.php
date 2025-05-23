<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome</title>
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{asset('css/adminprofile.css')}}">
  </head>

  <body>
    <div class="container">
      <aside>

        <div class="top">
          <div class="logo">
            {{-- <h2>Hi, <span class="danger">ADHIP</span> </h2> --}}
            <h2>Hi, <span class="danger">{{ strtoupper(explode(' ', session('admin')->admin_name)[0]) }}</span></h2>
          </div>
          <div class="close" id="close_btn">
            <span class="material-symbols-sharp">
              close
            </span>
          </div>
        </div>
        <!-- end top -->
        <div class="sidebar">
          <a href="/dashboard">
            <span class="material-symbols-sharp">grid_view </span>
            <h3>Dashboard</h3>
          </a>
          <a href="/adminuser" >
              <span class="material-symbols-sharp">person_outline </span>
              <h3>Users</h3>
          </a>
          <a href="/adminpost">
              <span class="material-symbols-sharp">insights </span>
              <h3>Posts</h3>
          </a>
          <a href="/admincommunity">
              <span class="material-symbols-sharp">receipt_long </span>
              <h3>Communities</h3>
          </a>
          <a href="#">
              <span class="material-symbols-sharp">mail_outline </span>
              <h3>Messages</h3>
              <span class="msg_count">14</span>
          </a>

          <a href="#">
              <span class="material-symbols-sharp">report_gmailerrorred </span>
              <h3>Reports</h3>
          </a>

          <a href="/adminprofile" class="active">
              <span class="material-symbols-sharp">settings </span>
              <h3>settings</h3>

          </a>

          <a href="{{ route('admin.logout') }}">
            <span class="material-symbols-sharp">Logout </span>
            <h3>Logout</h3>
          </a>
        </div>

      </aside>
      <!-- --------------
          end asid
        -------------------- -->

      <!-- --------------
          start main part
        --------------- -->

      <main>
        <h1>Profile</h1>

        @if(session('success'))
          <div id="toast-message" style="
              position: fixed;
              top: 20px;
              left: 56%;
              transform: translateX(-50%);
              background-color: #38a169;
              color: white;
              padding: 12px 20px;
              border-radius: 8px;
              font-weight: bold;
              box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
              z-index: 9999;
              transition: opacity 0.5s ease-in-out;
          ">
              {{ session('success') }}
          </div>
      
          <script>
              setTimeout(() => {
                  const toast = document.getElementById('toast-message');
                  if (toast) {
                      toast.style.opacity = '0';
                      setTimeout(() => toast.remove(), 500);
                  }
              }, 3000);
          </script>
      @endif    

        
        <form action="{{ route('admin.update.password') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="all-element-main-img">
            <div class="main-img-profile-img">
              {{-- <input type="file" name="" id="main-img-profile-img" style="display: none;" accept="image/*"> --}}
              <input type="file" name="profile_pic" id="main-img-profile-img" style="display: none;" accept="image/*">

              <label class="main-img-profile-img-lable" for="main-img-profile-img">
                <span style="font-size: 16px" id="upload-label">Profile Picture</span>
                <svg rpl="" fill="currentColor" height="16" icon-name="upload-outline" viewBox="0 0 20 20" width="16" xmlns="http://www.w3.org/2000/svg">
                    <path d="m10.513 5.63 3.929 3.928-.884.884-2.933-2.933V19h-1.25V7.51l-2.933 2.932-.884-.884L9.67 5.446l.589-.029.254.212Zm5.859-1.482A6.876 6.876 0 0 0 10 0a6.876 6.876 0 0 0-6.372 4.148A4.639 4.639 0 0 0 0 8.625a4.716 4.716 0 0 0 4.792 4.625V12A3.465 3.465 0 0 1 1.25 8.625 3.412 3.412 0 0 1 4.189 5.31l.364-.06.123-.35A5.607 5.607 0 0 1 10 1.25a5.607 5.607 0 0 1 5.324 3.65l.123.348.364.06a3.412 3.412 0 0 1 2.939 3.317A3.465 3.465 0 0 1 15.208 12v1.25A4.716 4.716 0 0 0 20 8.625a4.639 4.639 0 0 0-3.628-4.477Z"></path>
                  </svg>
              </label>

              <div id="image-preview-profile">
                @if($admin->profile_pic)
                    <img src="{{ asset('storage/'.$admin->profile_pic) }}" alt="Profile Picture" style="cursor: pointer;">
                @endif
            </div>            
            </div>
          </div>

          <div class="admin-details">

            {{-- <h1 >Mriganka Adhikary</h1> --}}
            <h1>{{ $admin->admin_name }}</h1>
            {{-- <h1 >mriganka@gmail.com</h1> --}}
            <h1>{{ $admin->admin_email }}</h1>
            <div class="admin-password">
              {{-- <input class="admin-password-input" type="password" name="new_password" id="new_password" placeholder="Update Password" value="{{ $admin->password }}" > --}}
              <input class="admin-password-input" type="password" name="new_password" id="new_password" placeholder="Enter new password">

              <button class="admin-password-button" type="submit">Update</button>
            </div>
          </div>
        </form>


      </main>
      <!------------------
          end main
          ------------------->

      <!----------------
          start right main 
        ---------------------->
      <div class="right">

        <div class="top">
          <button id="menu_bar">
            <span class="material-symbols-sharp">menu</span>
          </button>

          <div class="theme-toggler">
            <span class="material-symbols-sharp active">light_mode</span>
            <span class="material-symbols-sharp">dark_mode</span>
          </div>
          <div class="profile">
            <div class="info">
              {{-- <p><b>Adhip</b></p> --}}
              <p><b>{{(explode(' ', session('admin')->admin_name)[0]) }}</b></p>
              <p>Admin</p>
              <small class="text-muted"></small>
            </div>
            {{-- <div class="profile-photo">
              <img src="/Images/profile-1.jpg" alt="" />
            </div> --}}
            <div class="profile-photo">
              <a href="/adminprofile">
                @if($admin->profile_pic)
                    <img src="{{ asset('storage/' . $admin->profile_pic) }}" alt="Admin Profile Picture" />
                @else
                    <img src="https://plus.unsplash.com/premium_photo-1701090939615-1794bbac5c06?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Default Profile Picture" />
                @endif
              </a> 
            </div>
          </div>
        </div>




    </div>



    <script src="{{asset('js/adminprofile.js')}}"></script>
  </body>

</html>