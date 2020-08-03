#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Tue Apr 21 17:13:04 2020

@author: gurwosh
"""


from sklearn.datasets import load_iris
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.preprocessing import StandardScaler
from sklearn.decomposition import PCA
import id_ana
import pca_id_matching
import fire
import numpy as np


"""
class running:
"""   



def run():
        userdata = pd.read_json("log.json")
        userdataD = pd.DataFrame(userdata)
        userdataD.columns = ['user_ID', 'data_ID']
        
        irisDATA = pd.read_json('materials_data.json')
        userdata = userdataD.to_dict("list")
       
        pca_id_matching.edudata_pca(irisDATA)
        edudata_set = pca_id_matching.load_edudata()
        matchingdata = pca_id_matching.matching(userdata, edudata_set)
        
        
        id_data = userdata.get('user_ID')
        my_id_set = set(id_data)
        my_id_set_list = list(my_id_set)
        sql = len(my_id_set_list)
        
        
        q =[]
        
        for i in range(0,sql):
            k = my_id_set_list[i]
            result = id_ana.idset(k,matchingdata,edudata_set)
            result1 = result.to_dict("list")
            q.append(result1)
            
        
        qD = pd.DataFrame(q)    
        
        
        for i in range(len(qD)):
            qD.loc[i]['user_id'] = qD.loc[i]['user_id'][:1]
            
        print(qD)
        qD.to_json("recommend_data.json")
        
        
           
"""
if __name__ == "__main__":
    fire.Fire(running)
"""