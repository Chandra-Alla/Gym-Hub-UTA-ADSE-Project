import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

class IntegrationTestGymManagementSystem(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.get("http://localhost/adse/user_login.php")
        self.login()

    def tearDown(self):
        self.driver.quit()

    def login(self):
        username_input = self.driver.find_element(By.ID, "username")
        password_input = self.driver.find_element(By.ID, "password")
        submit_button = self.driver.find_element(By.CSS_SELECTOR, "button[type='submit']")

        username_input.send_keys("admin")
        password_input.send_keys("password")
        submit_button.click()

        WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.TAG_NAME, "h1"))
        )

    def test_add_member(self):
        self.driver.get("http://localhost:5000/add_member")
        name_input = self.driver.find_element(By.ID, "name")
        email_input = self.driver.find_element(By.ID, "email")
        phone_input = self.driver.find_element(By.ID, "phone")
        submit_button = self.driver.find_element(By.CSS_SELECTOR, "button[type='submit']")

        name_input.send_keys("John Doe")
        email_input.send_keys("johndoe@example.com")
        phone_input.send_keys("1234567890")
        submit_button.click()

        confirmation_message = WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.ID, "confirmation"))
        )

        self.assertIn("Member added successfully", confirmation_message.text)

if __name__ == '__main__':
    unittest.main()
