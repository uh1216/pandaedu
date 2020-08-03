#!/usr/bin/python

import pandas as pd
import time

while True:

    result_data = pd.read_json("./recommend_data.json")
    
    # 거리 삭제
    del result_data['distance']
    
    # 행 개수
    index_c = result_data.shape[0]
    
    # user_id 리스트 제거 코드
    for i,d in zip(range(index_c), result_data['user_id']):
        result_data['user_id'][i] = d[0]
    
    #user_id로 인덱스 맞추고 변환
    result_data = result_data.set_index('user_id')
    
    res = pd.DataFrame(result_data)
    res.to_json("./recommend_url.json") 
    
    time.sleep(60)