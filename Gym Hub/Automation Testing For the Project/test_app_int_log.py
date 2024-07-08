import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
from selenium.common.exceptions import NoSuchElementException, TimeoutException

class UserLoginTest(unittest.TestCase):
    def setUp(self):
        # Set up the browser settings and options
        chrome_options = Options()
        chrome_options.add_argument("--start-maximized")
        chrome_options.add_argument("--disable-popup-blocking")
        self.driver = webdriver.Chrome(options=chrome_options)
        self.driver.get("http://localhost/adse/user_login.php")

    def tearDown(self):
        self.driver.quit()

    def test_user_login(self):
        try:
            # Locate the username and password fields and the submit button
            username_input = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.ID, "username"))
            )
            password_input = self.driver.find_element(By.NAME, "pwd")
            submit_button = self.driver.find_element(By.CSS_SELECTOR, "button[name='login_user']")

            # Input the login credentials
            username_input.send_keys("cena")
            password_input.send_keys("12345")
            submit_button.click()

            # Wait for redirection to the user's homepage
            WebDriverWait(self.driver, 10).until(
                EC.url_contains("user_home.php")
            )

            # Additional check to verify successful login, e.g., checking for a welcome message
            welcome_text = self.driver.find_element(By.CSS_SELECTOR, "h3").text
            self.assertIn("Gym Hub", welcome_text)  # Verify that 'Welcome' is part of the header on the homepage

        except (NoSuchElementException, TimeoutException) as e:
            print(f"Test Failed: {e}")
            self.fail("User login failed or elements not found.")

if __name__ == "__main__":
    unittest.main()
