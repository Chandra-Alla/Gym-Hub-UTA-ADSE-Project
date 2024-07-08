import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

class TestFlaskApp(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.get("http://localhost:5000")

    def tearDown(self):
        self.driver.quit()

    def test_form_submission_click(self):
        # Find the input field and enter a name
        name_input = self.driver.find_element(By.ID, "name")
        name_input.send_keys("Alice")

        # Find the submit button and click it
        submit_button = self.driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
        submit_button.click()

        # Wait for the success page to load
        result = WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.TAG_NAME, "h1"))
        )

        # Check if we're on the success page and the greeting is correct
        self.assertEqual(self.driver.current_url, "http://localhost:5000/success?name=Alice")
        self.assertIn("Success Page", result.text)

    def test_form_submission_enter_key(self):
        # Find the input field, enter a name, and press Enter
        name_input = self.driver.find_element(By.ID, "name")
        name_input.send_keys("Bob")
        name_input.send_keys(Keys.RETURN)

        # Wait for the success page to load
        result = WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.TAG_NAME, "h1"))
        )

        # Check if we're on the success page and the greeting is correct
        self.assertEqual(self.driver.current_url, "http://localhost:5000/success?name=Bob")
        self.assertIn("Success Page", result.text)

if __name__ == '__main__':
    unittest.main()