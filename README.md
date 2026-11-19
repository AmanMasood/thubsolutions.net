# thubsolutions.net

Website for **THub Solutions**: a PHP site with no database, built for Apache hosting such as Hostinger.

## Pages
| URL | File |
|---|---|
| `/` | `index.php` |
| `/services` | `services.php` |
| `/services/{slug}` | `service.php` (custom-software, web-mobile-apps, cloud-devops, ai-automation) |
| `/about` | `about.php` |
| `/contact` | `contact.php` (contact form, sent with PHP `mail()`) |
| `/privacy`, `/terms` | `privacy.php`, `terms.php` |
| 404 | `404.php` |

## Editing content
- Phone, email and business hours: `includes/config.php`
- Service text (descriptions, lists, FAQs, technologies): the `$SERVICES` array in `includes/config.php`
- Styles: `assets/css/style.css`

## Deploying on Hostinger
1. In hPanel, open **Websites → thubsolutions.net → Advanced → Git**, add this repository on branch `main`, and set the install path to the site root (`public_html`).
2. Click **Deploy**, or turn on auto-deployment.
3. Create the mailbox **info@thubsolutions.net** under **Emails**. The contact form sends from and to this address.
4. Turn on SSL. Then uncomment the "Force HTTPS" lines in `.htaccess`, or use hPanel's Force HTTPS toggle.
5. Submit `https://thubsolutions.net/sitemap.xml` in Google Search Console.

Contact-form submissions are also saved to `../thub-enquiries/enquiries.log`, outside the web root, as a backup.
