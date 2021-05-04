const nonaktifkan = () => {
  const tombolhilang = document.querySelector(
    ".custom-control-input.tombolhilang"
  );
  const tombolmuncul = document.querySelector(
    ".custom-control-input.tombolmuncul"
  );
  const yangdihilangin = document.querySelector(".col-sm-4.yangdihilangin");

  tombolhilang.addEventListener("click", () => {
    yangdihilangin.classList.add("hilang");
  });
  tombolmuncul.addEventListener("click", () => {
    yangdihilangin.classList.remove("hilang");
  });
};
nonaktifkan();
