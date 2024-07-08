import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
from selenium.common.exceptions import NoSuchElementException, TimeoutException

class UserSignupTest(unittest.TestCase):
    def setUp(self):
        # Configure Chrome options for a more consistent testing environment
        chrome_options = Options()
        chrome_options.add_argument("--start-maximized")
        chrome_options.add_argument("--disable-popup-blocking")
        self.driver = webdriver.Chrome(options=chrome_options)
        self.driver.get("http://localhost/adse/signup.php")

    def tearDown(self):
        self.driver.quit()

    def test_user_signup(self):
        try:
            # Locate the signup form elements
            username_input = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.NAME, "username"))
            )
            email_input = self.driver.find_element(By.NAME, "email")
            password_input = self.driver.find_element(By.NAME, "pwd")
            confirm_password_input = self.driver.find_element(By.NAME, "pwd_confirm")
            signup_button = self.driver.find_element(By.CSS_SELECTOR, "button[name='register_user']")

            # Fill out the signup form
            username_input.send_keys("charles")
            email_input.send_keys("charles@gmail.com")
            password_input.send_keys("qwerty")
            confirm_password_input.send_keys("qwerty")
            signup_button.click()

            # Wait for redirection to confirm signup success
            WebDriverWait(self.driver, 10).until(
                EC.url_contains("user_login.php")
            )

            # Optionally check for a confirmation message or other element specific to the homepage
            welcome_message = self.driver.find_element(By.TAG_NAME, "h3").text
            self.assertIn("GymHub", welcome_message)

        except (NoSuchElementException, TimeoutException) as e:
            print(f"Test Failed: {e}")
            self.fail("Signup process failed or elements not found.")

if __name__ == "__main__":
    unittest.main()
