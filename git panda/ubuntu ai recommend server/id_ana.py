#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Mon Apr 20 17:05:15 2020

@author: gurwosh
"""


from sklearn.datasets import load_iris
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.preprocessing import StandardScaler
from sklearn.decomposition import PCA
from sklearn.cluster import KMeans
import pca_id_matching
import numpy as np
"""
userdata = pd.read_json("log.json")
userdataD = pd.DataFrame(userdata)
userdataD.columns = ['user_ID', 'data_ID']

irisDATA = pd.read_json('materials_data.json')
userdata = userdataD.to_dict("list")
       
pca_id_matching.edudata_pca(irisDATA)
edudata_set = pca_id_matching.load_edudata()
matchingdata = pca_id_matching.matching(userdata, edudata_set)
"""


def idset(userid,matching_data,edudata_set):

    idid =[] 
    idid = (matching_data[(matching_data['user_ID']==userid)])
    X = pd.DataFrame(idid)
   
        
    del X['user_ID']
    del X['data_ID']
    
    kmeans = KMeans(n_clusters =1).fit(X)
    pred = kmeans.predict(X)

    
    centers = kmeans.cluster_centers_
    
  
    
   
    idid2 =[] 
    idid2 = (matching_data[(matching_data['user_ID']==userid)])
    Y = pd.DataFrame(idid2)
    
    del Y['user_ID']

    
    
    
    lengE = []
    lengE = edudata_set.get('data_ID')
    p = len(lengE)
    
    
    
    lengY = []
    lengY = Y.get('data_ID')
    q = len(lengY)
   
    
    
    
    Yid = []
    Y2 = Y.reset_index()
    
    for i in range(0,q):
        k=Y2.loc[i]['data_ID']
        Yid.append(k)
    
   
    
    my_set = set(Yid)
    my_set_list = list(my_set)
    sq = len(my_set_list)
    
    
    
    def del_doc(i,edudata_set,my_set_list):  
    
        my_list = []
        a = my_set_list[i]
        
        
        t = []
        for y in range(len(edudata_set)):
            k = np.array(edudata_set.loc[y]['data_ID'])
            t.append(k)
        
        
        my_list.append(a)
        my = np.array(my_list)
        
        tl = np.array(t)
        res = np.intersect1d(my,t)
        
        if(res.size > 0):
            
            index = my_set_list[i]
            int(index)
            idid2 =[] 
            idid2 = (edudata_set[(edudata_set['data_ID']==index)])
            newEdu = edudata_set.drop(idid2.index[0],axis=0)
        
        else:
            newEdu = edudata_set
        
        return newEdu
   
   
    
    
    for i in range(0,sq):
        
        edudata_set_copy = edudata_set
        
        edudata_set = del_doc(i,edudata_set,my_set_list)
        
        if(len(edudata_set) != len(edudata_set_copy)):
            edudata_set = edudata_set.reset_index()
            del edudata_set['index']
   
    
    
    
    
    eq = len(edudata_set)
    
    
    
    def new_cl(edudata_set,centers):
        cen_list = list(centers)
        cen_x = cen_list[0][0]
        cen_y = cen_list[0][1]
        
        edudata_set2 = edudata_set.reset_index()
        
        recommend_dis =[]
        recommend_name =[]
        
        for i in range(0,eq):
            edu_x = edudata_set2.loc[i]['X']
            edu_y = edudata_set2.loc[i]['Y']
            data_name = edudata_set2.loc[i]['data_ID']
            
            sum_res_x = cen_x - edu_x
            sum_res_y = cen_y - edu_y
            
            sum_res_x2 = pow(sum_res_x,2)
            sum_res_y2 = pow(sum_res_y,2)
            
            sum_res2 = sum_res_x2+sum_res_y2
            
            sum_res = pow(sum_res2,0.5)
            
            recommend_dis.append(sum_res)
            recommend_name.append(data_name)
            
        recommend_dis = pd.DataFrame(recommend_dis)
        recommend_name = pd.DataFrame(recommend_name)
        
        recommend_res = pd.merge(recommend_dis,recommend_name,left_index=True,right_index = True)
       
        recommend_res = recommend_res.sort_values(by=['0_x'],axis = 0)
        recommend_res3 = recommend_res.head(20)
        
        recommend_resfi = recommend_res3.reset_index()
        del recommend_resfi['index']
        
        idlist = []
        
        for i in range(0,20):
            idlist.append(userid)
        
        
        idlistD = pd.DataFrame(idlist)
       
        global result
        
        result = pd.merge(idlistD,recommend_resfi,left_index=True,right_index = True)
        
        result.columns=['user_id','distance','data_id']
        
        
        return result
            
        
        
                
      
    
    
    result =new_cl(edudata_set,centers)
    
    return result
    
