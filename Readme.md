# reCAPTCHA Implementation Guide

Each version of reCAPTCHA is implemented in its respective PHP file:

- reCAPTCHA v2: [`v2.php`](./src/v2.php)
- Invisible reCAPTCHA v2: [`invisible.php`](./src/invisible.php)
- reCAPTCHA v3: [`v3.php`](./src/v3.php)

# Overview
# reCAPTCHA Implementation Overview

| Feature                | reCAPTCHA v2 ([`v2.php`](./v2.php)) | Invisible reCAPTCHA v2 ([`invisible.php`](./invisible.php)) | reCAPTCHA v3 ([`v3.php`](./v3.php))            |
|------------------------|-------------------------------------|-------------------------------------------------------------|------------------------------------------------|
| **Checkbox**           | Required                            | Not displayed                                               | Not displayed                                  |
| **Image Verification** | Might appear                        | Might appear                                                | Not displayed                                  |
| **Badge**              | Not displayed                       | Displayed but can be hidden (with user notice)              | Displayed but can be hidden (with user notice) |

## reCAPTCHA v2
- **Checkbox**: Required for users to interact with.
- **Image Verification**: Might appear based on various factors.
- **Badge**: Will not be displayed.

## Invisible reCAPTCHA v2
- **Checkbox**: Will not be displayed to the users.
- **Image Verification**: Might appear based on various factors.
- **Badge**:
    - By default, it's displayed in the bottom right corner of the screen.
    - It can be hidden using CSS, but according to Google's usage policy, users must be informed explicitly that reCAPTCHA is in use. [Refer here](https://developers.google.com/recaptcha/docs/faq#id-like-to-hide-the-recaptcha-badge.-what-is-allowed) for more details.

      ```css
      .grecaptcha-badge {
          display: none !important;
      }
      ```

      If you hide the badge, make sure to include the following notice:

      ```
      This site is protected by reCAPTCHA and the Google 
      [Privacy Policy](https://policies.google.com/privacy) and
      [Terms of Service](https://policies.google.com/terms) apply.
      ```
      
      Please note: Even when the badge is hidden, reCAPTCHA will still function as intended.


## reCAPTCHA v3
- **Checkbox**: Will not be displayed to the users.
- **Image Verification**: Will not be displayed to the users.
- **Badge**:
    - By default, it's displayed in the bottom right corner of the screen.
    - It can be hidden using CSS, but similar to Invisible reCAPTCHA, users must be informed explicitly that reCAPTCHA is in use.

      If you hide the badge, ensure to provide the aforementioned notice to the users.
  
      Please note: Even when the badge is hidden, reCAPTCHA will still function as intended.

