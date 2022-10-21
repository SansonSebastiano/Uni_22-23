#You are asked to define a Python code that, given a string, prints a string with all of the letters shifted by 2.
#For example, if the input is "Hello", the output should be "Jgnnq".
#The input string will be given as a command line argument.
#The output string should be printed to the console
#Hint: you can use the ord() function to get the ASCII code of a character, and the chr() function to get the character corresponding to an ASCII code.

# get string from input
string= input("Enter a string: ")

#Your code here
#shift each character by 2
for x in string:
    print(chr(ord(x)+2),end="")


