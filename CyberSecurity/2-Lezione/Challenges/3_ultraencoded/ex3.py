with open('zero_one', 'r') as file:
    contents = file.read()

#print(contents + '\n')

zero = 'ZERO'
one = 'ONE'

binaryContent = contents.replace(zero, '0')
binaryContent = binaryContent.replace(one, '1')

binaryContent = binaryContent.replace(' ', '')

print(binaryContent + '\n')

""""
binary_int = int(binaryContent, 2)
byte_number = binary_int.bit_length() + 7 // 8

binary_array = binary_int.to_bytes(byte_number, "big")
ascii_text = binary_array.decode()

print(ascii_text)
"""

#since it is a multiple of 8, we can think that this is a series of
#ascii characters
result=''.join(chr(int(binaryContent[i*8:i*8+8],2)) for i in range(len(binaryContent)//8))
print(result)

#the last couple of characters are '==' ... it looks a base64
import base64
decoded = base64.b64decode(result).decode('ascii')
print(decoded)

#the output is a morse code
alpha2morse = {'A': '.-',     'B': '-...',   'C': '-.-.',
        'D': '-..',    'E': '.',      'F': '..-.',
        'G': '--.',    'H': '....',   'I': '..',
        'J': '.---',   'K': '-.-',    'L': '.-..',
        'M': '--',     'N': '-.',     'O': '---',
        'P': '.--.',   'Q': '--.-',   'R': '.-.',
        'S': '...',    'T': '-',      'U': '..-',
        'V': '...-',   'W': '.--',    'X': '-..-',
        'Y': '-.--',   'Z': '--..',

        '0': '-----',  '1': '.----',  '2': '..---',
        '3': '...--',  '4': '....-',  '5': '.....',
        '6': '-....',  '7': '--...',  '8': '---..',
        '9': '----.' }

#reversing morse map
morse2alpha = {value:key for key,value in alpha2morse.items()}

#convert morse to string
decoded2 = []
for i in decoded.split():
    decoded2.append(morse2alpha.get(i))

decoded2 = ''.join(decoded2)

print(decoded2)
