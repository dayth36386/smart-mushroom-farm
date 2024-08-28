<style>
   a:-webkit-any-link {
      text-decoration: none !important;
   }
</style>
      <!--=============== HEADER ===============-->
      <header class="header">
         <nav class="nav container">
            <div class="nav__data">
               <a href="index.php" class="nav__logo">
               <i class="fi fi-sr-mushroom-alt"></i> Smart Mushroom
               </a>
               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line nav__burger"></i>
                  <i class="ri-close-line nav__close"></i>
               </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li><a href="index.php" class="nav__link">Home</a></li>

                  <li><a href="product.php" class="nav__link">Products</a></li>

                  <!--=============== DROPDOWN 1 ===============-->
                  <li class="dropdown__item">
                     <div class="nav__link">
                     Visualization <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="pagecharttemp.php" class="dropdown__link">
                           <i class="fi fi-rr-temperature-high"></i> Temperature & Humidity
                           </a>                          
                        </li>

                        <li>
                           <a href="pagechartequipment.php" class="dropdown__link">
                           <i class="fi fi-tr-stats"></i> Equipment Working Status
                           </a>
                        </li>

                        <li>
                           <a href="pagechartproduct.php" class="dropdown__link">
                           <i class="fi fi-rr-boxes"></i> Product
                           </a>
                        </li>

                     </ul>
                  </li>

                   <!--=============== DROPDOWN 2 ===============-->
                   <li class="dropdown__item">
                     <div class="nav__link">
                     Line <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="https://line.me/R/ti/g/VIHmDNDGw3" class="dropdown__link">
                           <i class="fi fi-rr-bell"></i> Line Notify
                           </a>
                        </li>

                     </ul>
                  </li>
                  
                  <li><a href="history.php" class="nav__link">History</a></li>

                  <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                  <li><a href="usermanagment.php" class="nav__link">User Management</a></li>
                  <?php endif; ?>
                  
                  <li><a href="logout.php" class="nav__link">Logout</a></li>
               </ul>
            </div>
         </nav>
      </header>

      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>