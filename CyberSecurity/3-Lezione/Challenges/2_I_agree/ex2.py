base_Alphabet = ('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 
'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z')

cipherText = 'vhixoieemksktorywzvhxzijqni'
key = 'caesar'

def decrypt(ctext, key):
    key_length = len(key)
    key_as_int = [ord(i) for i in key]
    ctext_int = [ord(i) for i in ctext]
    plaintext = ''
    
    for i in range(len(ctext_int)):
        value = (ctext_int[i] - key_as_int[i % key_length]) % 26
        plaintext += chr(value + 65)
    return plaintext

print(decrypt(cipherText, key))
