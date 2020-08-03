#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Mon Apr 20 16:57:55 2020

@author: gurwosh
"""

from sklearn.datasets import load_iris
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.preprocessing import StandardScaler
from sklearn.decomposition import PCA
from sklearn.cluster import KMeans
import numpy as np



def edudata_pca(irisDATA):
    
    
    w =[]
    
    for i in range(len(irisDATA)):
         k = irisDATA.loc[i]['uid']
         w.append(k)
        
    del irisDATA['uid']
    del irisDATA['title'] 
    del irisDATA['image'] 
    
    iris_scaled = StandardScaler().fit_transform(irisDATA)
        
    pca = PCA(n_components=2)
    pca.fit(iris_scaled)
    iris_pca = pca.transform(iris_scaled)
        
    pcaD = pd.DataFrame(iris_pca)
    
    wD = pd.DataFrame(w)
    
    pca_edudata = pd.merge(wD,pcaD,left_index=True,right_index = True)
    pca_edudata.to_json("edudatapca.json")
    
def load_edudata():
    global edudata_set
    edudata_set = pd.read_json("edudatapca.json")
    edudata_set.columns = ['data_ID','X','Y']
    return edudata_set

def matching(m_userdata,m_edudata):    
    
    data_list = []
        
    for i in range(len(m_edudata)):
        r = m_edudata.loc[i]['data_ID']
        data_list.append(r)
    
    t = np.array(data_list)
    dataD = pd.DataFrame(m_userdata)
    a=[]
    leng = []
    leng = m_userdata.get('user_ID')
    p = len(leng)
    for i in range(0,p):
            df_list = []
                     
            df = dataD.loc[i]['data_ID']
            df_list.append(df)
            z = np.array(df_list)
            res1 = np.intersect1d(z,t)
            
            
            if(res1.size > 0):
                idid =[] 
                idid = (m_edudata[(m_edudata['data_ID']==df)])
                X = pd.DataFrame(idid)
                X=X.reset_index()
                jw = X.loc[0]['X']
                
                a.append(jw)
            
            else:
                a.append(0)
                
    af = pd.DataFrame(a)
    new1 = pd.merge(dataD,af,left_index=True,right_index = True)
                
    b=[]
    for i in range(0,p):
            df_list2 = []
            df1 = dataD.loc[i]['data_ID']
            df_list2.append(df1)
            
            z2 = np.array(df_list2)
            res1 = np.intersect1d(z2,t)
            
            if(res1.size > 0):
                idid2 =[] 
                idid2 = (m_edudata[(m_edudata['data_ID']==df1)])
                Y = pd.DataFrame(idid2)
                Y=Y.reset_index()
                jw1 = Y.loc[0]['Y']
                
                
                b.append(jw1)
                
            else:
                b.append(0)
                
    af1 = pd.DataFrame(b)  
    global matchingdata
    
    matchingdata = pd.merge(new1,af1,left_index=True,right_index = True)

    return matchingdata
    


