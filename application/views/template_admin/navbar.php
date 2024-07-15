 <!-- navbar -->
 <nav class="navbar fixed-top navbar-expand-lg d-flex justify-content-between">
   <div class="toogle" id="toggle">
     <i class="bi bi-list"></i>
   </div>

   <div class="profile-dropdown">
     <div class="profile-drpdwn-btn" onclick="toggle()">
       <!-- <span><?= $user['nama']; ?></span> -->
       <span>Admin</span>
       <div class="profile-img">
         <img src="<?= base_url('assets/') ?>img/default.jpg" alt="">
       </div>
     </div>

     <ul class="drpdwn-list">
       <li class="profile-drpdwn-list-item mb-5"><a href=""><i class="bi bi-person-fill pe-2"></i>My Profile</a></li>
       <li class="profile-drpdwn-list-item"><a href=""><i class="bi bi-box-arrow-right pe-2"></i>Logout</a></li>
     </ul>
   </div>
 </nav>
 <!-- end navbar -->