#Define a randomic password generator.
#The password should contain 10 characters.
#Type of characters: alphanumeric
#The password should be printed to the console.

import random
import string

stringLength=10
letters = string.ascii_lowercase + string.ascii_uppercase + string.digits
print(''.join(random.choice(letters) for i in range(stringLength)))


