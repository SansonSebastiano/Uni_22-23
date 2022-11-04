import base64

original_data = 'El Psy Congroo'
encrypted_data = 'IFhiPhZNYi0KWiUcCls='
encrypted_flag = 'I3gDKVh1Lh4EVyMDBFo='

def base64tostring(ctext):
    return base64.b64decode(ctext).decode('utf-8', errors='ignore')


decrypted_data = base64tostring(encrypted_data)
decrypted_flag = base64tostring(encrypted_flag)

print(f"Decoding encrypted data: ", decrypted_data)
print(f"Decoding encrypted flag: ", decrypted_flag)

ascii_enc_data = list(decrypted_data.encode('ascii'))
ascii_orig_data = list(original_data.encode('ascii'))

print("ascii encrypred data: ", ascii_enc_data)
print("ascii original data: ", ascii_orig_data)

ascii_key = list(a^b for a,b in zip(ascii_enc_data, ascii_orig_data))
print('XOR [ascii key] = ', ascii_key)

# key = ''.join(map(chr, ascii_key))
# print('KEY: ', key)

ascii_flag = list(decrypted_flag.encode('ascii'))
ascii_flag = list(a^b for a,b in zip(ascii_key, ascii_flag))
print('XOR [ascii flag] = ', ascii_flag)

flag = ''.join(map(chr, ascii_flag))
print(flag)