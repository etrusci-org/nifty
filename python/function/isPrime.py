def isPrime(n):
    ''' Note that this checks with trial division and is thus very slow on large numbers.
    '''
    if n < 2:
        return False

    if n == 2:
        return True

    if n % 2 == 0:
        return False

    div_last = int(n ** 0.5) + 1
    div_cur  = 3
    while div_cur <= div_last:
        if n % div_cur == 0:
            return False
        div_cur += 2

    return True


''' Example:

n = 13

check = isPrime(n)

print(check)

'''
