import geopy.distance

def calc_dist(pt1,pt2):
    return geopy.distance.vincenty(pt1, pt2).km
