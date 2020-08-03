#!/usr/bin/python

import pandas as pd

from selenium import webdriver
from bs4 import BeautifulSoup

options = webdriver.ChromeOptions()
#options.add_argument('--headless')
options.add_argument('--no-sandbox')
options.add_argument('--disable-dev-shm-usage')
  

login_url = "http://54.180.73.119.xip.io/login"
driver_path = "./chromedriver"
browser = webdriver.Chrome(driver_path, options=options)
browser.get(login_url)

login = browser.find_element_by_id("user_login-1958")
login.clear()
login.send_keys("dnd") 

login = browser.find_element_by_id("user_password-1958")
login.clear()
login.send_keys("1234")

xpath= '//*[@id="um-submit-btn"]'
browser.find_element_by_xpath(xpath).click()


uidnum_li = []    
date_li = []
views_li = []
subject_li = []
category_li = []
title_li = []
img_li = []

for uidnum in range(25, 105):
    url = "http://54.180.73.119.xip.io/자료공유/?uid="+str(uidnum)+"&mod=document&pageid=1"
    
    browser.get(url)
    
    try:
        html = browser.page_source
    except:
        continue 
    
    soup = BeautifulSoup(html, "html.parser")
    
    # maintext_list = list()
    title_list = list()
    subject_list = list()
    writer_list = list()
    image_list = list()
    
    soup.script.decompose()
    subject = soup.findAll("div", {"class" : "detail-name"})
    title = soup.findAll("div", {"class" : "kboard-title"})
    # maintext = soup.findAll("div", {"class" :"content-view"})
    writer = soup.findAll("div", {"class" : "detail-value"})
    image = soup.findAll("img")

    

    
    # hannanum = Hannanum()
    # count_dan = 0
    # count_p = 0
    # all_lenth = 0
    
    for line in writer:
        text = line.get_text()
        text = text.replace("\n", "")
        text = text.replace("\t", "")
        writer_list.append(text)
    
    for line in subject:
        text = line.get_text()
        text = text.replace("\n", "")
        text = text.replace("\t", "")
        subject_list.append(text)
    
    for line in title: 
        text = line.get_text()
        text = text.replace("\n", "")
        text = text.replace("\t", "")
        title_list.append(text)
    
    if (image[1]['src'] == 'http://54.180.73.119.xip.io/wp-content/plugins/cosmosfarm-share-buttons/layout/default/images/xicon-share.png.pagespeed.ic.Plv8kL_tCD.webp'):
        image = 'http://54.180.73.119.xip.io/wp-content/uploads/2020/01/KakaoTalk_20200103_170357121-1.jpg'
    else :
        image = image[1]['src']

    image_list.append(image)
    
    #날짜 자르기
    
    date = writer_list[1].replace("-", "")
    date = date[2:8]
    
    #과목 코드 판별
    
    if subject_list[0] == "국어": 
        subject = 1
    elif subject_list[0] == "도덕":
        subject = 2
    elif subject_list[0] == "사회":
        subject = 3    
    elif subject_list[0] == "수학":
        subject = 4
    elif subject_list[0] == "과학":
        subject = 5
    elif subject_list[0] == "실과":
        subject = 6
    elif subject_list[0] == "체육":
        subject = 7
    elif subject_list[0] == "음악":
        subject = 8
    elif subject_list[0] == "미술":
        subject = 9
    elif subject_list[0] == "영어":
        subject = 10
    elif subject_list[0] == "창체":
        subject = 11
     
    #카테고리 코드 판별    
    
    if subject_list[1] == "수업활용": 
        category = 1
    elif subject_list[1] == "공개수업":
        category = 2
    elif subject_list[1] == "학습지":
        category = 3    
    elif subject_list[1] == "수행평가":
        category = 4
    elif subject_list[1] == "성취도평가(중간)":
        category = 5
    elif subject_list[1] == "성취도평가(기말)":
        category = 6
    elif subject_list[1] == "단원평가":
        category = 7
    elif subject_list[1] == "참고자료":
        category = 8
    elif subject_list[1] == "연수물":
        category = 9
    elif subject_list[1] == "공통":
        category = 10

    
    uidnum_li.append(int(uidnum))
    date_li.append(int(date))
    views_li.append(int(writer_list[2]))
    subject_li.append(subject)
    category_li.append(category)      
    title_li.append(title_list)
    img_li.append(image_list)
    
data ={
    "uid" : uidnum_li,
    "update_date" : date_li,
    "views" : views_li,
    "subject" : subject_li,
    "category" : category_li,
    "title" : title_li,
    "image" : img_li
    }

res = pd.DataFrame(data)

res.to_json("./materials_data.json")
        
browser.quit()
