import base64

cipher_text = 'Q2Flc2FyCg=='

def base64tostring(ctext):
    return base64.b64decode(ctext).decode('utf-8', errors='ignore')

print(f"Decoding = \t{base64tostring(cipher_text)}")

puzzle = 'fYZ7ipGIjFtsXpNLbHdPbXdaam1PS1c5lQ=='

puzzle_dec= base64tostring(puzzle)
print("Decoded puzzle: ", puzzle_dec)

def ceasar_cracker(ctext, from_ = -30, to_ = +30):
    for i in range(from_, to_):
        curr_step = ''.join([chr(ord(c) + i) for c in ctext])

        print(f"Step = {i}\t{curr_step}") 

ceasar_cracker(puzzle_dec)