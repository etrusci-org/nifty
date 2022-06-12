def isPrime(num):
    """Test a number for primality.

    Note that this checks with trial division and is thus very slow on large numbers.

    Args:
        num (integer): Number to test.

    Returns:
        boolean: Whether num is a prime.

    See: https://en.wikipedia.org/wiki/Prime_numbers
    """
    if num < 2:
        return False

    if num == 2:
        return True

    if num % 2 == 0:
        return False

    divLast = int(num ** 0.5) + 1
    divCurrent = 3
    while divCurrent <= divLast:
        if num % divCurrent == 0:
            return False
        divCurrent += 2

    return True
