# IT5233 Notes

## PHP Session IDs

Session IDs in PHP are MD5-hashed tokens containing an IP, the current time, and some PRNG. It's not very secure.

Theoretically a better way of doing this without introducing an attack vector is using CSPRNG and storing it in a database.

This also makes load-balancing possible, if everything queries to the same database!

## Log-Notify-Throttle

One major facet to app security is logging and properly reacting to user input, so that malicious attack is always noticed and dealt with properly. Sysadmins can't babysit the server all day, they have other stuff to do. So, to help them (or you, if you're the one deploying/managing!), you should:
* **Log** all critical site behavior.
  * Like logins, registers, password resets, other potentially vulnerable user actions, and database errors!
  * This project manages an audit log with PHP, though flat file logs are probably OK too.
* **Notify** system administrators or webmasters of suspicious user behavior.
  * A pretty obvious thing to do here is notify a webmaster if a ton of password attempts are being logged from a single IP.
  * E-mail is a good way of doing this, though maybe there are other internal methods.
  * Make sure you're notifying *once* at a certain threshold - don't want to spam your webmaster with E-mails in the event of an attack.
* **Throttle** suspicious behavior to slow down brute-force attacks.
  * Too many password attempts? Sleep for a few seconds. Benign users will get over it.
  * Consider banning repeat/constant offenders.
  * CAPTCHA systems are great for this.
