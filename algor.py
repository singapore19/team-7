import csv
import mlrose
import numpy as np
import matplotlib.pyplot as plt
from mpl_toolkits.basemap import Basemap
#priority queue1
list1=[]
with open('geocoded_address.csv', mode='r') as infile:
    reader = csv.reader(infile)
    header = next(reader)
    for row in reader:
        if int(row[7])==1 and row[9]=='OK':
            list1.append((float(row[5]),float(row[6])))
    # print(list1)

fitness_coords = mlrose.TravellingSales(coords = list1)
problem_fit = mlrose.TSPOpt(length = len(list1), fitness_fn = fitness_coords, maximize = False)
best_state, best_fitness = mlrose.genetic_alg(problem_fit, mutation_prob = 0.2,max_attempts =100,random_state = 2)
list2=[]
for j in range (len(best_state)):
    with open('geocoded_address.csv', mode='r') as infile:
        reader = csv.reader(infile)
        header = next(reader)
        for row in reader:
            if int(row[0])==best_state[j]+1:
                list2.append(row[4])
print('The best state found is: ', list2)
print('The fitness at the best state is: ', best_fitness)


def plotTSP(path, points, num_iters=100):
    x = []; y = []
    for i in paths:
        x.append(points[i][0])
        y.append(points[i][1])  
    plt.plot(x, y, 'co')
    a_scale = float(max(x))/float(1000000)
    # Draw the older paths, if provided
    if num_iters > 1:
        for i in range(1, num_iters):
            # Transform the old paths into a list of coordinates
            xi = []; 
            yi = [];
            for j in paths:
                xi.append(points[j][0])
                yi.append(points[j][1])
            plt.arrow(xi[-1], yi[-1], (xi[0] - xi[-1]), (yi[0] - yi[-1]), 
                    head_width = a_scale, color = 'r', 
                    length_includes_head = True, ls = 'dashed',
                    width = 0.00001/float(num_iters))
            for i in range(0, len(x) - 1):
                plt.arrow(xi[i], yi[i], (xi[i+1] - xi[i]), (yi[i+1] - yi[i]),
                        head_width = a_scale, color = 'r', length_includes_head = True,
                        ls = 'dashed', width = 0.00001/float(num_iters))

    # Draw the primary path for the TSP problem
    plt.arrow(x[-1], y[-1], (x[0] - x[-1]), (y[0] - y[-1]), head_width = a_scale, 
            color ='g', length_includes_head=True)
    for i in range(0,len(x)-1):
        plt.arrow(x[i], y[i], (x[i+1] - x[i]), (y[i+1] - y[i]), head_width = a_scale,
                color = 'g', length_includes_head = True)
    plt.xlim(min(x)*1.0000001, max(x)*1.0000001)
    plt.ylim(min(y)*1.0000001, max(y)*1.0000001)
    plt.show()

points=list1
paths = best_state

# Run the function
plotTSP(paths, points)
