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
        self.driver.get("http://localhost/adse/user_login.php")

    def tearDown(self):
        self.driver.quit()

    def test_login(self):
        # Wait for username input to be clickable
        WebDriverWait(self.driver, 10).until(
            EC.element_to_be_clickable((By.NAME, "username"))
        )

        # Find elements by the correct attributes
        username_input = self.driver.find_element(By.NAME, "username")
        password_input = self.driver.find_element(By.NAME, "pwd")
        submit_button = self.driver.find_element(By.NAME, "login_user")

        username_input.send_keys("cena")
        password_input.send_keys("12345")
        submit_button.click()

        # Now let's assume the redirection goes to a page with an `h3` tag containing "Welcome to Fitness, username!"
        WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.CSS_SELECTOR, "h3"))
        )
        welcome_text = self.driver.find_element(By.CSS_SELECTOR, "h3").text

        # We check that the text contains a welcome message that includes the username
        self.assertIn("Gym Hub", welcome_text)

if __name__ == '__main__':
    unittest.main()
