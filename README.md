# echecks-ai php Client

Echecks-ai is organized around REST API.Our API can be used to mail or email a check which is predictable and uses HTTP response codes to indicate any errors.

For more information contact support@onlinecheckwriter.com

# Installation & Usage
**Requirements** <br />
  PHP 7.4 and later. <br /> 
  
**Composer** <br />
  To install via [composer](https://getcomposer.org/), <br /> 
  composer require ocw/echecks-ai-php <br /> <br />
  
  # Getting Started
  ```
  Echeck::setToken('EiZNSqeKYpMcIZbEn3KFLDyNGKtMa7b6orEKro013a7v9TFZ6KYiOmL6QWM7');     
  Echeck::setEnviroment("SANDBOX");
  $echeck = new Echeck();
  ```
