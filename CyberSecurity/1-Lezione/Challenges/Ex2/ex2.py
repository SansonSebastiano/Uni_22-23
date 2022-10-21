#Define a simple calculator.
#The user uses the terminal and it has three variables.
#    - input1: first integer number
#    - input2: second integer number
#    - type of operation: a number associated to the operation (e.g., 0 for the addition)

input1 = int(input("Insert the first number: "))
input2 = int(input("Insert the second number: "))
operation = int(input("Insert the operation (0 for addition, 1 for subtraction, 2 for multiplication, 3 for division): "))

if operation == 0:
    print(input1 + input2)
elif operation == 1:
    print(input1 - input2)
elif operation == 2:
    print(input1 * input2)
elif operation == 3:
    print(input1 / input2)
else:
    print("Invalid operation")
