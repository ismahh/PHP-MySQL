<div id="top"></div>

## About The Project

A Login and Registeration Page Based on Assignment Given

## 1) easy: peek feature that allow user to see their saved password

* Implemented in register.php AND registerAPI.php . Use <script> tag inside.
    
    ![Peak](https://github.com/FA2500/auth/blob/master/images/ss1.PNG)

## 2) medium: check user entered email address availability using jQuery/Ajax (compare user input with data in database). 

* Implemented in register.php. Use checkemail.php, checkemail.js and AJAX to connect Database and change data accordingly.
    
    ![Available](https://github.com/FA2500/auth/blob/master/images/ss2.PNG)
    
    ![Unavailable](https://github.com/FA2500/auth/blob/master/images/ss3.PNG)

## c) medium: OTP or activation account using uniqid() and email function.

* Implemented in registerAPI.php. Use checkOTP.php and mail.php to send OTP number via email.
    
    ![OTP](https://github.com/FA2500/auth/blob/master/images/ss4.PNG)
    
    

## d) high: password strength meter using API. 

* I have created 2 ways to guess password strength

    i) AJAX Register = Use AJAX and Third Party JS to get user's password strength ( register.php )
    
     ![getAPI](https://github.com/FA2500/auth/blob/master/images/ss7.PNG)
    
    ii) GET API = Use AJAX and own API to get user's password strength ( registerAPI.php )
        
    ![code](https://github.com/FA2500/auth/blob/master/images/ss5.PNG)
    
    ![thirdparty](https://github.com/FA2500/auth/blob/master/images/ss6.PNG)
   


<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [PHPMailer](https://sourceforge.net/projects/phpmailer/)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

Download via Github Link / Git.

### Prerequisites

1) Laragon
    -   PHPMYADMIN
    -   PHPMAILER
    -   SSL

### Installation


1. Clone the repo
   ```sh
   git clone https://github.com/FA2500/auth.git
   ```

2. Upload auth.sql to PHPMYADMIN

3. All authentication are created with hardcode dummy account. 

4. Done

<p align="right">(<a href="#top">back to top</a>)</p>


## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Project Link: [https://github.com/FA2500/auth](https://github.com/FA2500/auth)

<p align="right">(<a href="#top">back to top</a>)</p>
