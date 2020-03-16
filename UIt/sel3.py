from selenium import webdriver
import time
EXE_PATH = 'C:\\Users\\v.shreebuvan\\Downloads\\chromedriver_win32\\chromedriver.exe'
driver = webdriver.Chrome(executable_path=EXE_PATH)
host = 'http://127.0.0.1/'
time_table = host + 'soft/time_table/'
signup_link = time_table + 'admin.php'
login_link = time_table + 'login.html'
home_link = time_table + 'success1.php'
#driver.get('http://192.168.43.211/php_resume/signup.html')
driver.get(signup_link)
#Bad email, good password # Expected:fail
driver.find_element_by_id('clgid').click()
time.sleep(5)
driver.find_element_by_id('defaultForm-emai').send_keys('mallikasachin@gmail.com')

driver.find_element_by_id('defaultForm-pas').send_keys('admin')
time.sleep(5)
submit = driver.find_element_by_id('login1').click()

if(driver.current_url == home_link):
    print('Test passed')
else:
    print('Test failed')
print(driver.current_url)

driver.close()