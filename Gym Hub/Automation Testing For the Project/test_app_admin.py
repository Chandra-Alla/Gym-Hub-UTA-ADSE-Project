import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

class UnitTestGymManagementSystem(unittest.TestCase):
    def setUp(self):
        service = Service(executable_path='C:\\webdrivers\\chromedriver-win64\\chromedriver.exe')
        self.driver = webdriver.Chrome(service=service)
        self.driver.get("http://localhost/adse/admin_login.php")  # Change URL to admin login

    def tearDown(self):
        self.driver.quit()

    def test_admin_login(self):
        WebDriverWait(self.driver, 10).until(
            EC.element_to_be_clickable((By.NAME, "username"))
        )

        # Find elements by the correct attributes
        username_input = self.driver.find_element(By.NAME, "username")
        password_input = self.driver.find_element(By.NAME, "pwd")
        login_button = self.driver.find_element(By.NAME, "login_admin")  # Updated to admin login button name

        username_input.send_keys("admin")  # Use admin credentials
        password_input.send_keys("admin")  # Use admin credentials
        login_button.click()

        # Check for successful redirection, likely the URL might include a query string like 'info=add_gym'
        WebDriverWait(self.driver, 10).until(
            EC.url_contains("home.php?info=add_gym")  # Checking if the URL contains specific query params after login
        )
        
        # If there's a specific element we expect to see on the admin page, we can check for that:
        # Example: Check for the presence of a specific element unique to the admin page
        WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.TAG_NAME, "h3"))  # Adjust depending on actual content of the admin page
        )
        header_text = self.driver.find_element(By.TAG_NAME, "h3").text
        self.assertIn("ADD GYM", header_text)  # Expecting something with 'Admin' in the header, adjust as necessary

if __name__ == '__main__':
    unittest.main()
