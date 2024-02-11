@include(layout.app)
@section('start')
<header>
    <div class="top_header">
      <div class="container">
        <div class="top_header_text">
            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="32" viewBox="0 0 31 32" fill="none">
              <path d="M15.3857 0.272243L15.9115 7.2018C16.2342 11.4408 19.6029 14.8094 23.8383 15.1285L30.7678 15.6543L23.8383 16.1874C19.5993 16.5101 16.2306 19.8788 15.9115 24.1141L15.3857 31.0437L14.8599 24.1141C14.5372 19.8752 11.1685 16.5065 6.93318 16.1874L0 15.658L6.92956 15.1322C11.1685 14.8094 14.5372 11.4408 14.8563 7.20542L15.3857 0.272243Z" fill="white"></path>
            </svg>
            <p>Free Shipping On Orders $50+ See Details | Order Status</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="32" viewBox="0 0 31 32" fill="none">
              <path d="M15.3857 0.272243L15.9115 7.2018C16.2342 11.4408 19.6029 14.8094 23.8383 15.1285L30.7678 15.6543L23.8383 16.1874C19.5993 16.5101 16.2306 19.8788 15.9115 24.1141L15.3857 31.0437L14.8599 24.1141C14.5372 19.8752 11.1685 16.5065 6.93318 16.1874L0 15.658L6.92956 15.1322C11.1685 14.8094 14.5372 11.4408 14.8563 7.20542L15.3857 0.272243Z" fill="white"></path>
            </svg>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="main_header">
        <div class="main_top_header">
          <div class="languge_change"> 
            <select class="vodiapicker">
              <option value="en" class="test">USA</option> 
              <option value="en" class="test">JAPAN</option> 
              <option value="en" class="test">india</option> 
              <option value="en" class="test">spain</option> 
              <option value="en" class="test">german</option> 
              <option value="en" class="test">France</option> 
              <option value="en" class="test">russian</option> 
              <option value="en" class="test">china</option> 
              <option value="en" class="test">italian</option> 
              <option value="en" class="test">turkey</option> 
              <option value="en" class="test">korea</option> 
              <option value="en" class="test">greece</option> 
            </select>  
            <select class="currancy_select">
              <option>AED</option>
              <option>USA</option>
              <option>INR </option>
            </select> 
            <div class="call">
              <i class="fa-solid fa-phone"></i>
              <a href="tel:9199999999998">+91 9199999999998</a>
            </div>
          </div>
          <div class="logo">
            <a href="index.html">
              <img src="images/logo.png">
            </a>
          </div>
          <div class="right_header">
            <div class="wishlist">
              <a href="#">
                <i class="fa-regular fa-heart fa-beat"></i>
              </a>
            </div>
            <div class="cart">
              <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            <a href="login.html" class="main-btn">
              login/register <img src="images/login_icon.svg" class="ps-3">
            </a>
          </div>
        </div>
        <div class="main_bottom_header">
          <nav class="navbar navbar-expand-lg "> 
            <div class="logo d-lg-none d-inline-block">
              <a href="index.html">
                <img src="images/logo.png">
              </a>
            </div>
            <div class="d-flex align-items-center">
              <a href="cart.html" class="cart_icon"><img src="images/cart.svg"></a>
              <a href="login.html" class="cart_icon"><img src="images/login_icon.svg"></a>
              <button class="header_toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Outdoor</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Ride ons</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="#">Indoor</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="#">Scooter</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="#">Off-road</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="#">summer collection</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="#">accessories</a>
                </li>  
              </ul>
              <form class="d-flex search_form">
                <input class="form-control me-2 input_search" type="search" placeholder="Search..................." aria-label="Search">
                <button class="light_btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </form>
            </div> 
          </nav>
        </div>
      </div>
    </div>
</header>
<main>
        <section class="breadcrub_section">
            <h2 class="login_breadcrub" style="display: none;">Log in to your account</h2>
            <h2 class="register_breadcrub" style="display: inline-block;">Register in to your account</h2>
        </section>
        <section class="login_section">
            <div class="container">
                <div class="row inner_login_row">
                    <div class="col-lg-6 col-12">
                        <div class="login_shape_bg">
                            <img src="images/login_shape.svg" class="login_shape">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 login_col_box">
                        <div class="inner_login_col_box">
                            <div class="tabs_row"> 
                                <div class="changable_tab">
                                  <div class="radio_container">
                                    <input class="login_change" type="radio" name="radio" id="login" value="login" checked="">
                                    <label for="login">Log in</label>
                                    <input class="login_change" type="radio" name="radio" id="register" value="register">
                                    <label for="register">Register</label> 
                                  </div>
                                </div>
                            </div>
                            <form class="login_form main_form" style="display: none;"> 
                                <div class="row"> 
                                    <div class="line_input_box col-12">
                                      <label class="form-label">E-mail</label>
                                      <input type="text" class="appointment_input" placeholder="E-mail">
                                    </div> 
                                    <div class="line_input_box col-12">
                                      <label class="form-label">Password</label>
                                      <input type="text" class="appointment_input" placeholder="Password">
                                    </div>   
                                    <div class="mb-3 form-check">
                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                      <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                      <a href="#" class="forgot_text">Forgot Password ?</a>
                                    </div>
                                    <div class="banner_btn_grp main_btn text-center">
                                      <a href="#" class="main-btn">Login</a>
                                    </div> 
                                    <div class="form_divider">
                                      <h4>OR</h4>
                                    </div>
                                    <div class="social_login">
                                      <a href="#"><img src="images/facebook.svg"></a>
                                      <a href="#"><img src="images/google.svg"></a>
                                    </div>
                                </div> 
                            </form>
                            <form class="register_form main_form" style="display: inline-block;">
                                  <div class="row"> 
                                    <div class="line_input_box col-6">
                                      <label class="form-label">First Name</label>
                                      <input type="text" class="appointment_input" placeholder="First Name">
                                    </div> 
                                    <div class="line_input_box col-6">
                                      <label class="form-label">Last Name</label>
                                      <input type="text" class="appointment_input" placeholder="Last Name">
                                    </div>  
                                    <div class="line_input_box col-12">
                                      <label class="form-label">Email</label>
                                      <input type="text" class="appointment_input" placeholder="Email">
                                    </div>  
                                    <div class="line_input_box col-12">
                                      <label class="form-label">Password</label>
                                      <input type="text" class="appointment_input" placeholder="Password">
                                    </div>   
                                    <div class="mb-3 form-check">
                                      <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                      <label class="form-check-label" for="exampleCheck2">I agree all statements in Terms Of Service</label>
                                    </div> 
                                    <div class="banner_btn_grp main_btn text-center">
                                      <a href="#" class="main-btn">Register</a>
                                    </div> 
                                    <div class="form_divider">
                                      <h4>OR</h4>
                                    </div>
                                    <div class="social_login">
                                      <a href="#"><img src="images/facebook.svg"></a>
                                      <a href="#"><img src="images/google.svg"></a>
                                    </div>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="process_section">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-12" data-aos="fade-up"  >
                <div class="process_box">
                  <div class="part_img">
                    <img src="images/delivery.svg" class="delivery">
                  </div>
                  <div class="part_text">
                      <h4>Expressed Delivery</h4>
                      <p>Click here for more info</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-12" data-aos="fade-up" data-aos-delay="200">
                <div class="process_box">
                  <div class="part_img">
                    <img src="images/return.svg" class="return">
                  </div>
                  <div class="part_text">
                      <h4>30 Days Return</h4>
                      <p>Simply return it within 30 days for an exchange.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-12" data-aos="fade-up" data-aos-delay="400">
                <div class="process_box">
                  <div class="part_img">
                    <img src="images/payment.svg" class="payment">
                  </div>
                  <div class="part_text">
                      <h4>100%  Secure Payment</h4>
                      <p>Shop open from Monday to Sunday</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-12" data-aos="fade-up" data-aos-delay="600">
                <div class="process_box">
                  <div class="part_img">
                    <img src="images/support.svg" class="support">
                  </div>
                  <div class="part_text">
                      <h4>Support 24/7</h4>
                      <p>Contact us 24 hours a day and days a week</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> -->
</main>
@endsection