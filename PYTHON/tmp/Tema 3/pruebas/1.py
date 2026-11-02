def es_losa_activa(losas=0):
    for i in range(1,501):
        if(i % 11 == 0 or i % 10 == 4):
            losas = losas+1
    return losas

def main():
    print(es_losa_activa())

if __name__ == '__main__':
    main()