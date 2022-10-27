# Sherlock has a mystery in front of him. Help him to find the flag.

with open('challenge.txt', 'r') as file:
    contents = file.read()

upperContent = ''.join(c for c in contents if c.isupper())

print(upperContent + '\n')

zero = 'ZERO'
one = 'ONE'

binaryContent = upperContent.replace(zero, '0')
binaryContent = binaryContent.replace(one, '1')

print(binaryContent + '\n')

binary_int = int(binaryContent, 2)
byte_number = binary_int.bit_length() + 7 // 8

binary_array = binary_int.to_bytes(byte_number, "big")
ascii_text = binary_array.decode()

print(ascii_text)
