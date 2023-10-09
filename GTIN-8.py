import math
gtin_int=int(input("Enter number to be encoded "))
def gtin_encode(gtin_int):
    multiply = 3
    sum=0
    print(gtin_int)
    for digit in range(0,7):
        sum=sum+int(multiply*int(gtin_int[digit]))
        if multiply == 3:
            multiply = 1
        elif multiply ==1:
            multiply = 3
        check = ((math.ceil(sum/10))*10)-sum
        return (gtin_int+str(check))
print(gtin_encode)