import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

class UnitTestGymManagementSystem(unittest.TestCase):
    def setUp(self):
        # Specify the correct path to the chromedriver
        service = Service(executable_path='C:\\webdrivers\\chromedriver-win64\\chromedriver.exe')
        self.driver = webdriver.Chrome(service=service)
        # Navigate to the signup page
        self.driver.get("http://localhost/adse/signup.php")

    def tearDown(self):
        self.driver.quit()

    def test_signup(self):
        WebDriverWait(self.driver, 10).until(
            EC.element_to_be_clickable((By.NAME, "username"))
        )

        # Fill out the signup form
        username_input = self.driver.find_element(By.NAME, "username")
        email_input = self.driver.find_element(By.NAME, "email")
        password_input = self.driver.find_element(By.NAME, "pwd")
        confirm_password_input = self.driver.find_element(By.NAME, "pwd_confirm")
        signup_button = self.driver.find_element(By.NAME, "register_user")

        # Input data for new user
        username_input.send_keys("lorel")
        email_input.send_keys("lorel@gmail.com")
        password_input.send_keys("123456")
        confirm_password_input.send_keys("123456")

        signup_button.click()

        # Assume that successful signup redirects to user_home.php
        # You will need to adjust this depending on what actually happens after signup
        WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.TAG_NAME, "h3"))  # This needs to match the actual result of a successful signup
        )
        # Check the page for some expected outcome, here we just check if 'h3' tag which might say something like "Welcome, newuser!"
        page_header = self.driver.find_element(By.TAG_NAME, "h3").text
        self.assertIn("GymHub", page_header)  # Adjust the expected text accordingly

if __name__ == '__main__':
    unittest.main()
