from selenium import webdriver
import time
EXE_PATH = 'C:\\Users\\v.shreebuvan\\Downloads\\chromedriver_win32\\chromedriver.exe'
driver = webdriver.Chrome(executable_path=EXE_PATH)
host = 'http://127.0.0.1/'
time_table = host + 'soft/time_table/'
signup_link = time_table + 'index1.php'

#Home page
driver.get(signup_link)
print(driver.current_url)

#Student module
time.sleep(5)
driver.find_element_by_id('ab').click()
time.sleep(5)
print(driver.current_url)
driver.back()

#Faculty Course module
driver.find_element_by_id('ab1').click()
time.sleep(5)
print(driver.current_url)
driver.back()

#Faculty module
driver.find_element_by_id('ab2').click()
time.sleep(5)
print(driver.current_url)
driver.back()

#Admin module(clg admin)
driver.find_element_by_id('ab3').click()
time.sleep(5)
driver.find_element_by_id('clgid').click()
time.sleep(5)
driver.find_element_by_id('defaultForm-emai').send_keys('mallikasachin@gmail.com')
driver.find_element_by_id('defaultForm-pas').send_keys('admin')
submit = driver.find_element_by_id('login1').click()

#button in clg admin

#assign courses
driver.find_element_by_id('abc').click()
time.sleep(2)
print(driver.current_url)
driver.back()
time.sleep(5)

#generate section
driver.find_element_by_id('abc1').click()
time.sleep(2)
print(driver.current_url)
driver.back()
time.sleep(2)

#generate slots
driver.find_element_by_id('abc2').click()
time.sleep(2)
print(driver.current_url)
driver.back()
time.sleep(2)

#edit timetable
driver.find_element_by_id('abc3').click()
time.sleep(2)
print(driver.current_url)
driver.back()
time.sleep(2)

#delete timetable 
driver.find_element_by_id('abc4').click()
time.sleep(2)
print(driver.current_url)
driver.back()
time.sleep(2)

#generate timetable
driver.find_element_by_id('abc5').click()
time.sleep(2)
print(driver.current_url)
driver.back()
time.sleep(2)

#logout
driver.find_element_by_id('abc6').click()

#Admin module(clg admin)
driver.find_element_by_id('ab3').click()
time.sleep(5)
driver.find_element_by_id('deptid').click()
time.sleep(5)
driver.find_element_by_id('defaultForm-email').send_keys('mallikasachin@gmail.com')
driver.find_element_by_id('defaultForm-pass').send_keys('admin')
submit = driver.find_element_by_id('login').click()
print(driver.current_url)
#button in dept admin


#add/remove faculty module
driver.find_element_by_id('ac').click()
print(driver.current_url)
time.sleep(2)

#add faculty module
driver.find_element_by_id('abcd').click()
time.sleep(5)
print(driver.current_url)
driver.back()

#remove faculty module
driver.find_element_by_id('abcd1').click()
time.sleep(5)
print(driver.current_url)
driver.back()
time.sleep(2)
driver.back()
time.sleep(5)

#add/remove course module
driver.find_element_by_id('ac1').click()
print(driver.current_url)
time.sleep(2)


#add course module
driver.find_element_by_id('abcd').click()
time.sleep(5)
print(driver.current_url)
driver.back()

#remove course module
driver.find_element_by_id('abcd1').click()
time.sleep(5)
print(driver.current_url)
driver.back()
time.sleep(2)
driver.back()
time.sleep(5)

#add/remove deparmtment module
driver.find_element_by_id('ac2').click()
print(driver.current_url)
time.sleep(2)


#add deparmtment module
driver.find_element_by_id('abcd').click()
time.sleep(5)
print(driver.current_url)
driver.back()

#remove deparmtment module
driver.find_element_by_id('abcd1').click()
time.sleep(5)
print(driver.current_url)
driver.back()
time.sleep(2)
driver.back()
time.sleep(5)

#add/remove class/room
driver.find_element_by_id('ac3').click()
time.sleep(2)
print(driver.current_url)
driver.back()
time.sleep(2)

#add new semester
driver.find_element_by_id('ac4').click()
time.sleep(2)
print(driver.current_url)
driver.back()
time.sleep(2)

#logout
driver.find_element_by_id('ac5').click()
print(driver.current_url)

#Feedback 
driver.find_element_by_id('ab4').click()
time.sleep(5)
print(driver.current_url)
driver.back()

#class availability
driver.find_element_by_id('ab5').click()
time.sleep(5)
print(driver.current_url)
driver.back()