import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
from selenium.common.exceptions import NoSuchElementException, TimeoutException

class AddMemberTest(unittest.TestCase):
    def setUp(self):
        chrome_options = Options()
        chrome_options.add_argument("--start-maximized")
        chrome_options.add_argument("--disable-popup-blocking")
        self.driver = webdriver.Chrome(options=chrome_options)
        self.driver.get("http://localhost/adse/admin_login.php")
        self.login()

    def tearDown(self):
        self.driver.quit()

    def login(self):
        # Assume admin login credentials are correct and admin login page is well-formed
        username_input = WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.NAME, "username"))
        )
        password_input = self.driver.find_element(By.NAME, "pwd")
        submit_button = self.driver.find_element(By.CSS_SELECTOR, "button[type='submit']")

        username_input.send_keys("admin")
        password_input.send_keys("admin")
        submit_button.click()
        
        # Ensure login was successful by checking for a specific element on the redirected page
        WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.TAG_NAME, "h3"))  # Assuming there is an h1 tag on the home page
        )

    def test_add_member(self):
        # Navigate directly to the add member page
        self.driver.get("http://localhost/adse/home.php?info=add_member")
        
        # Fill out the form fields
        member_id_input = self.driver.find_element(By.NAME, "id")
        member_name_input = self.driver.find_element(By.NAME, "name")
        age_input = self.driver.find_element(By.NAME, "age")
        dob_input = self.driver.find_element(By.NAME, "dob")
        package_input = self.driver.find_element(By.NAME, "package")
        mobileno_input = self.driver.find_element(By.NAME, "mobileno")
        pay_id_input = self.driver.find_element(By.NAME, "pay_id")
        trainer_id_input = self.driver.find_element(By.NAME, "trainer_id")
        add_button = self.driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
        
        # Input data into the form
        member_id_input.send_keys("M6")
        member_name_input.send_keys("John Doe")
        age_input.send_keys("30")
        dob_input.send_keys("01/02/1994")
        package_input.send_keys("Platinum")
        mobileno_input.send_keys("1234567890")
        pay_id_input.send_keys("Payment6")
        trainer_id_input.send_keys("T6")

        # Submit the form
        add_button.click()
        
        # Verify success message
        success_message = WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.CSS_SELECTOR, "div.alert-success"))
        )
        self.assertIn("Member added successfully", success_message.text)

if __name__ == "__main__":
    unittest.main()
