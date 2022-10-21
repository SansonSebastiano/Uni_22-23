#The hard drive may be corrupted, but you were able to recover a small chunk of text (see "book.txt").
#Scribbled on the back of the hard drive is a set of mysterious numbers. 
#Can you discover the meaning behind these numbers? (1, 9, 4) (4, 2, 8) (4, 8, 3) (7, 1, 5) (8, 10, 1)


from stat import ST_GID


with open('CyberSecurity/2-Lezione/Challenges/1_valley_of_fear/book.txt', 'r') as file:
    contents = file.read()

paragraphs = contents.split('\n\n')

key = [[1,9,4], [4,2,8], [4,8,3], [7,5,1], [8,10,1]]
output = []

for row in key:
    lines = paragraphs[row[0] - 1].split('\n')
    line = lines[row[1] - 1]
    words = line.split(' ')
    output.append(words[row[2] - 1])

print(' '.join(output))   # = the flag is journals plates