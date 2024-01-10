//
// Created by student on 10.01.2024.
//

#include <gtest/gtest.h>
// #include <gmock/gmock-matchers.h>
#include "functions.h"

TEST(IsEvenTest, OddTests)
{
    ASSERT_EQ(false, isEven(5));
}

TEST(IsEvenTest, EvenTests)
{
    ASSERT_NE(false, isEven(6));
}

//TEST(SingTest, FirstIfTests)
//{
//    ASSERT_THAT(1, Eq(sign(6)))
//}