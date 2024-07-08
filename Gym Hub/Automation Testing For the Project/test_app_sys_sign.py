import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
from selenium.common.exceptions import NoSuchElementException, TimeoutException

class GymManagementSystemTest(unittest.TestCase):
    def setUp(self):
        chrome_options = Options()
        chrome_options.add_argument("--start-maximized")
        chrome_options.add_argument("--disable-popup-blocking")
        self.driver = webdriver.Chrome(options=chrome_options)

    def tearDown(self):
        self.driver.quit()

    def test_user_signup_and_exercise_navigation(self):
        # Sign up new user
        self.driver.get("http://localhost/adse/signup.php")
        username_input = WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.NAME, "username"))
        )
        email_input = self.driver.find_element(By.NAME, "email")
        password_input = self.driver.find_element(By.NAME, "pwd")
        confirm_password_input = self.driver.find_element(By.NAME, "pwd_confirm")
        signup_button = self.driver.find_element(By.CSS_SELECTOR, "button[name='register_user']")

        username_input.send_keys("claire")
        email_input.send_keys("claire@gmail.com")
        password_input.send_keys("123456")
        confirm_password_input.send_keys("123456")
        signup_button.click()

        # Wait for redirection to login page
        WebDriverWait(self.driver, 10).until(
            EC.url_contains("user_login.php")
        )

        # Log in with the new user credentials
        username_login_input = self.driver.find_element(By.NAME, "username")
        password_login_input = self.driver.find_element(By.NAME, "pwd")
        login_button = self.driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
        
        username_login_input.send_keys("claire")
        password_login_input.send_keys("123456")
        login_button.click()

        # Navigate to the Exercises page
        WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.TAG_NAME, "h3"))  # Assuming successful login checks
        )
        self.driver.get("http://localhost/adse/view_gym.php")

        # Interact with 'Show More' buttons
        WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.CLASS_NAME, "header"))
        )
        show_more_buttons = self.driver.find_elements(By.CSS_SELECTOR, ".card button")
        for button in show_more_buttons:
            # Open the link in a new tab using a script (this avoids the need to handle new windows opened by clicking)
            url = button.get_attribute('onclick').split("'")[1]  # Assuming the URL is in the onclick attribute
            self.driver.execute_script(f"window.open('{url}','_blank');")

            # Switch to the new tab and verify the URL
            original_window = self.driver.current_window_handle
            self.driver.switch_to.window(self.driver.window_handles[-1])
            self.assertTrue("youtube.com" in self.driver.current_url)
            self.driver.close()  # Close the new tab
            self.driver.switch_to.window(original_window)  # Switch back to the main window

if __name__ == "__main__":
    unittest.main()
